<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class ContactController extends Controller
{
    /**
     * fonction pour liste des Contacts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data= Contact::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-default btn-sm" style="border:none; "><span class="material-icons" style="color:grey; font-size: 16px;">  edit</span></button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" style="border:none;" class="delete btn btn-default btn-sm"><span style="color:grey; font-size: 16px;" class="material-icons"> delete</span></button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" style="border:none; " class="show btn btn-default btn-sm"><span style="color:grey; font-size: 16px;" class="material-icons">visibility </span></button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     *fonction pour  Ajouter une nouvelle contact.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
            {
                 $contat = array(
                'civilite'        =>  'required',
                'prenom'          =>  'required',
                'nom'             =>  'required',
                'telephone'       =>  'required',
                'email'           =>  'required',
                'fonction'        =>  'required',
                'service'         =>  'required',
                'date_naissonce'  =>  'required',
                'nom_societe'     =>  'required',
                'address'         =>  'required',
                'code_postal'     =>  'required',
                'ville'           =>  'required',
                'tele_societe'    =>  'required',
                'site_web'        =>  'required'
                
                );

                $error = Validator::make($request->all(),  $contat);

                if($error->fails())
                {
                    return response()->json(['errors' => $error->errors()->all()]);
                }
                $civility =$request->civilite;
                    if($civility == "on"){
                        $civility = 'madamme';
                        }
                $form_data = array(
                    
                    'civilite'        => $civility,
                    'prenom'          =>  $request->prenom,
                    'nom'             =>  $request->nom,
                    'telephone'       =>  $request->telephone,
                    'email'           =>  $request->email,
                    'fonction'        =>  $request->fonction,
                    'service'         =>  $request->service,
                    'date_naissonce'  =>  $request->date_naissonce,
                    'nom_societe'     =>  $request->nom_societe,
                    'address'         =>  $request->address,
                    'code_postal'     =>  $request->code_postal,
                    'ville'           =>  $request->ville,
                    'tele_societe'    =>  $request->tele_societe,
                    'site_web'        =>  $request->site_web
                );

                Contact::create($form_data);

                return response()->json(['success' => 'Data Added successfully.']);
            }

    /**
     *fonction pour  affichage les detail d'un contact.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(request()->ajax())
        {
            $contact = Contact::findOrFail($id);
            return response()->json(['result' => $contact]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $contact = Contact::findOrFail($id);
            return response()->json(['result' => $contact]);
        }
    }

    /**
     *fonction pour modiffier les informations d'un contact.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
         $contat = array(
            'civilite'        =>  'required',
            'prenom'          =>  'required',
            'nom'             =>  'required',
            'telephone'       =>  'required',
            'email'           =>  'required',
            'fonction'        =>  'required',
            'service'         =>  'required',
            'date_naissonce'  =>  'required',
            'nom_societe'     =>  'required',
            'address'         =>  'required',
            'code_postal'     =>  'required',
            'ville'           =>  'required',
            'tele_societe'    =>  'required',
            'site_web'        =>  'required'
        );

        $error = Validator::make($request->all(),  $contat);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $civility =$request->civilite;
        if($civility == "on"){
            $civility = 'madamme';
              }
        $form_data = array(
            'civilite'        => $civility,
            'prenom'          =>  $request->prenom,
            'nom'             =>  $request->nom,
            'telephone'       =>  $request->telephone,
            'email'           =>  $request->email,
            'fonction'        =>  $request->fonction,
            'service'         =>  $request->service,
            'date_naissonce'  =>  $request->date_naissonce,
            'nom_societe'     =>  $request->nom_societe,
            'address'         =>  $request->address,
            'code_postal'     =>  $request->code_postal,
            'ville'           =>  $request->ville,
            'tele_societe'    =>  $request->tele_societe,
            'site_web'        =>  $request->site_web
        );

        Contact::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * fonction pour supprimer un contact.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contcat = Contact::findOrFail($id);
        $contcat->delete();
    }
}
