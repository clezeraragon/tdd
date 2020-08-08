<?php


namespace App\Services;


use App\Models\Pathology;
use App\Models\User;
use DB;

class ServiceInfection
{
    private User $user;
    private Pathology $pathology;

    public function __construct(User $user,Pathology $pathology)
    {
        $this->user = $user;
        $this->pathology = $pathology;
    }

    public function store($request)
    {
        try {

            DB::beginTransaction();

            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('123456')
            ]);

            $pathology = $this->pathology->create([
                'title' => $request->title,
                'gravity' => $request->gravity,
                'cured' => $request->cured
            ]);

            $user->users_x_pathology()->create([
                'pathology_id' => $pathology->id
            ]);

            DB::commit();
            return response()->json(["success" => "Registro criado com sucesso"],201);

        }catch (\Exception $exception) {
            DB::rollback();
            return response()->json(['errors' => $exception->getMessage()],403);
        }
    }

}
