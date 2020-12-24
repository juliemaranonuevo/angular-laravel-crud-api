<?php
declare(strict_types=1);
namespace App\Repositories;
use App\Contracts\AccountRepositoryInterface;
use App\Account;
use App\Dto\AccountData;

class AccountRepository implements AccountRepositoryInterface {

    public function addAccount(AccountData $accountData) {
        // $product = Product::create([
        //     'code' => $productData->code,
        //     'name' => $productData->name,
        //     'unit' => $productData->unit,
        //     'selling_price' => $productData->sellingPrice,
        //     'cost_price' => $productData->costPrice,
        //     'category' => $productData->category,
        //     'remarks' => $productData->remarks
        // ]);

        // $mapImageValueToPhotoKey = array_map(function($image) {
        //     return ['photo' => $image];
        // }, $productData->images);

        // $product->photos()->createMany($mapImageValueToPhotoKey);

        $account = new Account;
        $account->user_id = $accountData->user_id;
        $account->first_name = $accountData->first_name;
        $account->middle_name = $accountData->middle_name;
        $account->last_name = $accountData->last_name;
        $account->extension_name = $accountData->extension_name;
        $account->address = $accountData->address;
        $account->email = $accountData->email;
        $account->contact_number = $accountData->contact_number;
        $account->image = $accountData->image;
        $account->save();

    }

    public function isExistsAccountUserId(string $user_id) {
        $accounts = Account::where('user_id', $user_id)->get();

        return $accounts->isNotEmpty();
    }
}
