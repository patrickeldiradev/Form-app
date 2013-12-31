<?php

namespace App\Modules\Form\Controllers;

use App\Facades\FormHandlerFacade;
use App\Http\Controllers\Controller;
use App\Modules\Form\Models\Form;
use App\Modules\Form\Requests\StoreFormRequest;
use App\Modules\Form\Requests\StoreQuestionnaireRequest;
use App\Modules\Form\Service\JsonParser;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

use function response;

/**
 *
 */
class FormsController extends Controller
{
    /**
     * @var JsonParser
     */
    public JsonParser $jsonParserService;

    /**
     * @param \App\Modules\Form\Service\JsonParser $jsonParserService
     */
    public function __construct(JsonParser $jsonParserService)
    {
        $this->jsonParserService = $jsonParserService;
    }

    /**
     * @param \App\Modules\Form\Requests\StoreFormRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function storeForm(StoreFormRequest $request)
    {
        FormHandlerFacade::storeForm($request->input('checklist'));

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
