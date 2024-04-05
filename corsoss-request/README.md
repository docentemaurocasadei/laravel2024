obiettivo: realizzare una rotta per ritornare dei parametri della request
demo su http://localhost:8000/request

creare una rotta request
Route::get('/request', RequestController::class);

creare un controller
class RequestController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'fullUrl' => $request->fullUrl(),
            'host' => $request->host(),
            'fullUrlWithQuery' => $request->fullUrlWithQuery(['param' => 'test']),
            'bearerToken' => $request->bearerToken(),
        ]);       
    }
}

risposta:
{
    "fullUrl": "http://127.0.0.1:8000/request",
    "host": "127.0.0.1",
    "fullUrlWithQuery": "http://127.0.0.1:8000/request?param=test",
    "bearerToken": "1|nADnvgwO6HbNNX172OsQalKhxUM9HsWBHaCbVKNu196eed5f"
}