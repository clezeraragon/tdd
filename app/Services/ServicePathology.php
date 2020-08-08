<?php


namespace App\Services;


use App\Models\Pathology;
use DB;

class ServicePathology
{
    private Pathology $pathology;

    public function  __construct(Pathology $pathology)
    {
        $this->pathology = $pathology;
    }

    public function store($request)
    {
        try {

            DB::beginTransaction();

            $this->pathology->create($request->all());

            DB::commit();
            return response()->json(["success" => "Registro criado com sucesso"],201);

        }catch (\Exception $exception) {
            DB::rollback();
            return response()->json(['errors' => $exception->getMessage()],403);
        }
    }

    public function update($request,$pathology)
    {
        try {

            DB::beginTransaction();

            $this->pathology->find($pathology)->update($request->all());

            DB::commit();
            return response()->json(["success" => "Registro atualizado com sucesso"],202);

        }catch (\Exception $exception) {
            DB::rollback();
            return response()->json(['errors' => $exception->getMessage()],403);
        }
    }

    public function destroy($pathololy)
    {

        try {

            DB::beginTransaction();

            $result = $this->pathology->findOrFail($pathololy);

            $result->users_x_pathology()->delete();
            $result->delete();

            DB::commit();
            return response()->json(["success" => "Registro removido com sucesso"],202);

        }catch (\Exception $exception) {
            DB::rollback();
            return response()->json(['errors' => $exception->getMessage()],403);
        }
    }

}
