<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dto\AccountData;
use App\Services\AccountService;
use App\Contracts\AccountRepositoryInterface;
use App\Account;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    private $accountService;

    public function __construct(AccountService $accountService, AccountRepositoryInterface $accountRepository) {
        $this->accountService = $accountService;
        $this->accountRepository = $accountRepository;
    }

    public function checkConnection(): JsonResponse
    {
        $accounts = Account::paginate(10);

        return response()->json($accounts);
    }

    public function index(): JsonResponse
    {
        $accounts = Account::paginate(10);

        return response()->json($accounts);
    }
    
    public function addAccount(Request $request): JsonResponse
    {
        // $account = new Account;
        // $account->user_id = $request->userId;
        // $account->first_name = $request->firstName;
        // $account->middle_name = $request->middleName;
        // $account->last_name = $request->lastName;
        // $account->extension_name = $request->extensionName;
        // $account->address = $request->address;
        // $account->email = $request->emailAddress;
        // $account->contact_number = $request->contactNumber;
        // $account->image = $request->image[0];
        // $account->save();
        // $data = [
        //     "message" => "The item was created successfully"
        // ];

        // return response()->json($data, 201);

        $accountForm = $request->all();

        $accountData = new AccountData();
        $accountData->user_id = $accountForm['userId'];
        $accountData->first_name = $accountForm['firstName'];
        $accountData->middle_name = $accountForm['middleName'];
        $accountData->last_name = $accountForm['lastName'];
        $accountData->extension_name = $accountForm['extensionName'];
        $accountData->address = $accountForm['address'];
        $accountData->email = $accountForm['emailAddress'];
        $accountData->contact_number = $accountForm['contactNumber'];
        $accountData->image = $accountForm['image'][0];

        $response = $this->accountService->addAccount($accountData);

        return $response;
    }

    public function isExistsProductCode(Request $request): JsonResponse {
        $user_id = $request->query('code');
        $isExistsUserId = $this->accountRepository->isExistsAccountUserId($user_id);
        return response()->json($isExistsUserId);
    }

    public function show($id): JsonResponse
    {
        $accounts = Account::where('id', $id)->get();

        return response()->json($accounts);
    }
}
