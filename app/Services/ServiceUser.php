<?php


namespace App\Services;


use App\Models\User;
use DB;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;

class ServiceUser
{
    private $user;

    public function  __construct(User $user)
    {
        $this->user = $user;
    }

    public function store($request)
    {
        try {

            DB::beginTransaction();

            $this->user->create($request->all());

            DB::commit();
            return response()->json(["success" => "Registro criado com sucesso"],201);

        }catch (\Exception $exception) {
            DB::rollback();
            throw new \Exception($exception->getMessage());
        }
    }

    public function update($request,$user)
    {
        try {

            DB::beginTransaction();

            $this->user->find($user)->update($request->all());

            DB::commit();
            return response()->json(["success" => "Registro atualizado com sucesso"],202);

        }catch (\Exception $exception) {
            DB::rollback();
            return $exception->getMessage();
        }
    }

    public function destroy($user)
    {

        try {

            DB::beginTransaction();

            $this->user->find($user)->delete();

            DB::commit();
            return response()->json(["success" => "Registro removido com sucesso"],202);

        }catch (\Exception $exception) {
            DB::rollback();

        }
    }

}
