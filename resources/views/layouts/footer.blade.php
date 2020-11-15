
<script>

    $( function() {
     
      $("#date_naissonce").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-80:+0",
        dateFormat : 'dd/mm/yy',
        maxDate: '0',  

          
          
      });
      $("#sdate_naissonce").datepicker({
        dateFormat : 'dd/mm/yy',
        maxDate: '0',    
        
          
      });
    } );
    $(document).ready(function(){
    
        $('#user_table').DataTable({
            bProcessing: true,
            bServerSide: true,
            sPaginationType: "full_numbers",
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            bjQueryUI: true,
            
            ajax: {
            url: "{{ route('contact.index') }}",
            },
            columns: [
            { data: 'civilite',name: 'civilite' },
            {data: 'prenom', name: 'prenom'},
            { data: 'nom', name: 'nom' },
            {data: 'telephone',name: 'telephone'},
            {data: 'email',name: 'email'},
            {data: 'nom_societe',name: 'nom_societe' },
            {data: 'ville',name: 'ville'},
            {data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        
        $('#create_record').click(function(){
            $('.modal-title').text('Ajouter un contact');
            $('#action_button').val('Add');
            $('#action').val('Add');
            $('#form_result').html('');
        
            $('#formModal').modal('show');
        });

       //fonctionement de form edit et submit
    $('#sample_form').on('submit', function(event){
        event.preventDefault();
        var action_url = '';
    
        if($('#action').val() == 'Add')
        {
        action_url = "{{ route('contact.store') }}";
        }
    
        if($('#action').val() == 'Edit')
        {
        action_url = "{{ route('contact-update') }}";
        }
        
        $.ajax({
        url: action_url,
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        success:function(data)
        {
        var html = '';
        if(data.errors)
        {
            html = '<div class="alert alert-danger">';
            for(var count = 0; count < data.errors.length; count++)
            {
            html += '<p>' + data.errors[count] + '</p>';
            }
            html += '</div>';
        }
        if(data.success)
        {
            html = '<div class="alert alert-success">' + data.success + '</div>';
            $('#sample_form')[0].reset();
            $('#user_table').DataTable().ajax.reload();
        }
        $('#form_result').html(html);
        }
        });
    });
   
   //fonction d'edit
    $(document).on('click', '.edit', function(){
     var id = $(this).attr('id');
     $('#form_result').html('');
     $.ajax({
      url :"/contact/"+id+"/edit",
      dataType:"json",
      success:function(data)
      {
       $('#civilite').val(data.result.civilite);
       $('#prenom').val(data.result.prenom);
       $('#nom').val(data.result.nom);
       $('#fonction').val(data.result.fonction);
       $('#service').val(data.result.service);
       $('#email').val(data.result.email);
       $('#telephone').val(data.result.telephone);
       $('#date_naissonce').val(data.result.date_naissonce);
       $('#nom_societe').val(data.result.nom_societe);
       $('#address').val(data.result.address);
       $('#code_postal').val(data.result.code_postal);
       $('#ville').val(data.result.ville);
       $('#tele_societe').val(data.result.tele_societe);
       $('#site_web').val(data.result.site_web);
       $('#hidden_id').val(id);
       $('.modal-title').text(data.result.nom +' '+ data.result.prenom);
       $('#action_button').val('Edit');
       $('#action').val('Edit');
       $('#formModal').modal('show');
      }
     })
    });

    //fonction d'affichage les donner
   
    $(document).on('click', '.show', function(){
     var id = $(this).attr('id');
     $('#form_show').html('');
     $.ajax({
      url :"/contact/"+id ,
      dataType:"json",
      success:function(data)
      {
       $('#scivilite').val(data.result.civilite);
       $('#sprenom').val(data.result.prenom);
       $('#snom').val(data.result.nom);
       $('#sfonction').val(data.result.fonction);
       $('#sservice').val(data.result.service);
       $('#semail').val(data.result.email);
       $('#stelephone').val(data.result.telephone);
       $('#sdate_naissonce').val(data.result.date_naissonce);
       $('#snom_societe').val(data.result.nom_societe);
       $('#saddress').val(data.result.address);
       $('#scode_postal').val(data.result.code_postal);
       $('#sville').val(data.result.ville);
       $('#stele_societe').val(data.result.tele_societe);
       $('#ssite_web').val(data.result.site_web);
       $('.modal-title').text(data.result.nom +' '+ data.result.prenom);
       $('#showModal').modal('show');
      }
     })
    });
   
   
   //fonction pour confirmer la suppression
    var cid;
    $(document).on('click', '.delete', function(){
     cid = $(this).attr('id');
     $('#confirmModal').modal('show');
    });
   
    $('#ok_button').click(function(){
     $.ajax({
      url:"contact/destroy/"+cid,
      beforeSend:function(){
       $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
       setTimeout(function(){
        $('#confirmModal').modal('hide');
        $('#user_table').DataTable().ajax.reload();
        alert('Data Deleted');
       }, 2000);
      }
     })
    });
   
   });
   </script>


<!--    Style  -->
   <style>
       #create_record{
        background-color: #65DC3D; 
         background-color: #65DC3D; /
         border: none; 
         color: white; 
         padding: 5px 16px; 
         font-size: 16px; 
         cursor: pointer; 
       }
       
     
       #create_record:hover {
         background-color: #3ba318;
       }
       
       .addblock{
           border-left-width: 3px !important;
           border-style: solid;
           border-width: 0.5px;
           border-color: #c5d4ef;
           width: 492px;
           height: 445px;;
           margin: 6px;
       }
       .modal-content{
           height: 645px;
       }
       h3{
           color: gray;
       }
       .labeltext{
           color: gray;
       }
       #action_button{
           width:103px;
           margin-left: 21px;
       
       }
       table.dataTable  tbody tr td button{
           display: inline !important;
       }
      
       table.dataTable thead {background-color:#325D81 ; height: 30px;}
       table.dataTable thead tr th {color:white; text-align: left;  font-family: none;
       font-style: normal;}
       table.dataTable thead tr th .sorting{color:white;}
       table.dataTable  tbody > tr {
            height: 50px;
            }
       
       .material-icons{
            font-size: 21px;
            margin-left: -13px;
           vertical-align: text-top;
           color: white; 
       }
       div.dataTables_wrapper div.dataTables_filter input {
       
       width: 135% !important; 
      
       background-color: #dfeff7 !important;
       }
       div.dataTables_wrapper div.dataTables_filter {
       
       margin-left: 36% !important;
       text-align: left;
           }
           .btshow{
               background-color: rgb(156 153 153 / 52%);
               color: white;
           }
               
           table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
       border-bottom-width: 0;
     
       text-transform: capitalize;
           }
   </style>
       