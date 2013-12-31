<?php

namespace App\Http\Controllers;

use App\Bussiness\Facades\FormhandlerFacade;
use App\Bussiness\Service\JsonParserService;
use App\Http\Requests\StoreFormRequest;
use App\Http\Requests\StoreQuestionnaireRequest;
use App\Models\Form;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

/**
 *
 */
class FormsController extends Controller
{
    /**
     * @var JsonParserService
     */
    public JsonParserService $jsonParserService;

    /**
     * @param JsonParserService $jsonParserService
     */
    public function __construct(JsonParserService $jsonParserService)
    {
        $this->jsonParserService = $jsonParserService;
    }

    /**
     * @param StoreFormRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function storeForm(StoreFormRequest $request)
    {
        FormhandlerFacade::storeForm($request->input('checklist'));

        return response('', Response::HTTP_CREATED);
    }

    /**
     * @param Form $form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getForm(Form $form)
    {
        $data = Redis::get($form->uuid);

        return response($data);
    }

    /**
     * @param StoreQuestionnaireRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function storeQuestionnaire(StoreQuestionnaireRequest $request)
    {
        return response('storeQuestionnaire');
    }
}
