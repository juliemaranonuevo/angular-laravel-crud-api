<?php

namespace App\Services;
use App\Contracts\AccountRepositoryInterface;
use App\Repositories\AccountRepository;
use App\Dto\AccountData;

class AccountService {

    private $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository) {
        $this->accountRepository = $accountRepository;
    }

    public function addAccount(AccountData $accountData) {

        $accountUserId = $accountData->user_id;
        $isExistsAccountUserId = $this->accountRepository->isExistsAccountUserId($accountUserId);

        if($isExistsAccountUserId) {
            $error = [
               "message" => "Validation errors in your request",
               "errors" => [
                   [
                       "message" => "Duplicate Account User Id",
                       "code" => 23,
                       "field" => "code"
                   ]
               ]
            ];

            return response()->json($error, 400);
        }

        if(!$isExistsAccountUserId) {
            $addedAccount = $this->accountRepository->addAccount($accountData);
            $data = [
                "message" => "New account was created successfully"
            ];
            return response()->json($data, 201);
        }
    }
}


