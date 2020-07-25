<?php namespace App\Controllers;

use App\Models\UniversidadModel;

class Universidad extends BaseController
{
	public function index()
	{
                log_message('error','alucina');
                $model = new UniversidadModel();

                $data['universidades'] = $model->orderBy('cod_universidad', 'ASC')->findAll();
                
                return view('lista_universidad', $data);
        }
        
        public function nuevo() 
        {
                $data['universidad']=null;

                return view("nueva_universidad",$data);
        }

        public function guardar()
        {
                $model = new UniversidadModel();

                $id = $this->request->getVar('cod_universidad');

                $data = [

                        'nombre' => $this->request->getVar('nombre'),
                        'direccion' => $this->request->getVar('direccion'),
                        'web' => $this->request->getVar('web')
                ];

                if ($id)
                {

                        $model->update($id,$data);
                }        
                else                        
                        $model->insert($data);

                return redirect()->to(base_url()."/universidad");
        }

        public function borrar($id = null)
        {

                $model = new UniversidadModel();
                
                $model->where('cod_universidad',$id)->delete();

                return redirect()->to(base_url()."/universidad");
        }

        public function editar($id = null)
        {
                log_message('info','>>>>>>>>>>>>>>>>>>>>>>');

                $model = new UniversidadModel();
                
                $data['universidad']=$model->where('cod_universidad',$id)->first();
                log_message('info',$data['universidad']['nombre']);

                return view("nueva_universidad",$data);
        }
	//--------------------------------------------------------------------

}