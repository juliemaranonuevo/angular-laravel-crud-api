<?php
namespace App\Contracts;
use App\Dto\AccountData;

interface AccountRepositoryInterface {

    public function addAccount(AccountData $accountData);

    public function isExistsAccountUserId(string $user_id);

}
