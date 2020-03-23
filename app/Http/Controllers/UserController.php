<?php

namespace App\Http\Controllers;

use App\Address;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        echo "<h1>Dados do usuario</h1><br>";

        echo "Nome do usuário: {$user->name}<br>";
        echo "Email do usuário: {$user->email}<br>";

        $userAdress = $user->addressDelivery()->get()->first();

        if($userAdress){

            echo "<h1>Endereço de Entrega</h1><br>";

            echo "Endereço: {$userAdress->address}, Número: {$userAdress->number}<br>";
            echo "Complemento: {$userAdress->complement}, {$userAdress->zipcode}<br>";
            echo "Cidade/Estado: {$userAdress->city}/{$userAdress->state}<br>";
        }

        /*Criação de endereço de usuário a partir do próprio usuario, passando o model de Delivery e chamando
        obj e passando dentro do save*/
//        $address = new Address([
//            'address' => 'Rua dos Bobos',
//            'number' => '0',
//            'complement' => 'Apto 123',
//            'zipcode' => '88000-000',
//            'city' => 'São Paulo',
//            'state' => 'SP'
//        ]);
//
//        $user->addressDelivery()->save($address);

        /*Salvando endereço atacando os obj diretamente e chamando o método save*/
//        $address = new Address();
//        $address ->address = "Rua dos bobos 1";
//        $address ->number = "02";
//        $address ->complement = "Apto 000";
//        $address ->zipcode = "09900-000";
//        $address ->city = "Belo Horizonte";
//        $address ->state = "MG";
//
//        $user->addressDelivery()->save($address);

        /*Criando endereço a partir do usuário com saveMany para criar mais de um endereço para o mesmo usuário*/
//        $addressTeste = new Address([
//            'address' => 'Rua dos Bobos 111',
//            'number' => '0',
//            'complement' => 'Apto 123',
//            'zipcode' => '88000-000',
//            'city' => 'São Paulo',
//            'state' => 'SP'
//        ]);
//
//        $address = new Address();
//        $address ->address = "Rua dos bobos 222";
//        $address ->number = "02";
//        $address ->complement = "Apto 000";
//        $address ->zipcode = "09900-000";
//        $address ->city = "Belo Horizonte";
//        $address ->state = "MG";
//
//        $user->addressDelivery()->saveMany([$addressTeste, $address]);

        /*OBS: Obrigatoriamente quando eu estou salvando um endereço usando o save(), obrigatoriamente o mesmo deve
        estar passando por um modelo, como os exemplos acima, que nos casos acima é o Address*/





        /*Criando endereço a partir do create, a passando dos parametrôs não necessitam passar por um modelo porém,
        a aplicação se torna um pouco menos segura ou sucetivel a erros por as regras existentes dentro dos models
        não iram afetar o create*/

//        $user->addresDelivery()->create([
//            'address' => 'Rua Teste',
//            'number' => '25',
//            'complement' => 'Apto 123',
//            'zipcode' => '07700-000',
//            'city' => 'Rio de Janeiro',
//            'state' => 'RJ'
//        ]);

        /*Assim como o create acima tem o createMany, para passar mais de um parametro*/
//        $user->addressDelivery()->createMany([[
//            'address' => 'Rua Teste 0102',
//            'number' => '0102',
//            'complement' => 'Apto 123',
//            'zipcode' => '06600-000',
//            'city' => 'Rio de Janeiro',
//            'state' => 'RJ'
//        ], [
//            'address' => 'Rua Teste 0304',
//            'number' => '0304',
//            'complement' => 'Apto 123',
//            'zipcode' => '05500-000',
//            'city' => 'Rio de Janeiro',
//            'state' => 'RJ'
//        ]]);

        /*Evitar o uso do witch pois ele tráz uma carga gigantesca ao banco de dados por a cada usuário buscado
        ele traz o relacionamento do mesmo e pode diminuir a performance do banco de dados*/
//        $users = User::with(addressDelivery);
//        dd($users);

        /**********************************Relacionamento um-para-muitos**********************************************/
        $posts = $user->posts()->orderBy('id', 'DESC')->get();

        if($posts){

            echo "<h1>Artigos</h1><br>";

            foreach($posts as $post){

                echo "Titulo: #{$post->id} / {$post->title}<br>";
                echo "Subtitulo: {$post->subtitile}<br>";
                echo "Contéudo: {$post->description}<br><hr>";

            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
