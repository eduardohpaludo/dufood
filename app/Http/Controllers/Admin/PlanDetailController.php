<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanDetail;
use App\Models\Plan;
use App\Models\PlanDetail;
use Illuminate\Http\Request;

class PlanDetailController extends Controller
{

    protected $repository, $plan;

    public function __construct(PlanDetail $planDetail, Plan $plan)
    {
        $this->repository = $planDetail;
        $this->plan = $plan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($planUrl)
    {
        if(!$plan = $this->plan->where('url', $planUrl)->first()){
            return redirect()->back();
        }

        //$details = $plan->details();
        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($planUrl)
    {
        if(!$plan = $this->plan->where('url', $planUrl)->first()){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePlanDetail $request, $planUrl)
    {
        if(!$plan = $this->plan->where('url', $planUrl)->first()){
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('plan.details.index', ['url' => $plan->url]);

        //if($plan)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($planUrl, $detailId)
    {
        $plan = $this->plan->where('url', $planUrl)->first();
        $detail = $this->repository->find($detailId);

        if(!$plan || !$detail){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', [
            'plan' => $plan,
            'detail' => $detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($planUrl, $detailId)
    {
        $plan = $this->plan->where('url', $planUrl)->first();
        $detail = $this->repository->find($detailId);

        if(!$plan || !$detail){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePlanDetail $request, $planUrl, $detailId)
    {
        $plan = $this->plan->where('url', $planUrl)->first();
        $detail = $this->repository->find($detailId);

        if(!$plan || !$detail){
            return redirect()->back();
        }

        $detail->update($request->all());
        return redirect()->route('plan.details.index', ['url' => $plan->url]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($planUrl, $detailId)
    {
        $plan = $this->plan->where('url', $planUrl)->first();
        $detail = $this->repository->find($detailId);

        if(!$plan || !$detail){
            return redirect()->back();
        }

        $detail->delete();

        return redirect()
                    ->route('plan.details.index', ['url' => $plan->url])
                    ->with('message', 'Registro deletado com sucesso');

    }
}
