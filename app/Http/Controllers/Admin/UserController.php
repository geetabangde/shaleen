<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
public function index()
{
$users = Admin::latest()->get();
return view('admin.users.index',compact('users'));
}
public function create()
{
return view('admin.users.create');
}
public function store(Request $request)
{
    // return $request;
$request->validate([
'name'          => 'required|string|max:255',
'email'         => 'required|email|unique:admins,email',
'password'           => 'required|string|min:6|confirmed',
'password_confirmation' => 'required|string|min:6',
'department'    => 'required|string',
'contact_number'=> ['required', 'digits:10'],
'role'          => 'required|string',
'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
// 'bank_name'     => 'nullable|string|max:255',
// 'account_number'=> 'required_with:bank_name|string|max:50',
// 'ifsc'          => 'required_with:bank_name|string|max:20',
// 'account_type'  => 'required_with:bank_name|string|max:20',
]);

$imagePath = null;
if ($request->hasFile('image')) {
$imagePath = $request->file('image')->store('profile_images', 'public');
}
$user = new Admin();
$user->name = $request->name;
$user->email = $request->email;
$user->contact_number = $request->contact_number;
$user->password = $request->password;
$user->department = $request->department;
$user->role = $request->role;
$user->image = $imagePath; 
$user->bank_name = $request->bank_name;
$user->account_number = $request->account_number;
$user->ifsc_code = $request->ifsc;
$user->account_type = $request->account_type;
$user->save();
return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
}
public function edit($id)
{
$user=Admin::findOrFail($id);
return view('admin.users.edit', compact('user'));
}
public function update(Request $request, $id)
{
$user = Admin::findOrFail($id);
$request->validate([
'name'           => 'required|string|max:255',
'email'          => 'required|email|unique:users,email,' . $user->id,
'password'           => 'required|string|min:6|confirmed',
'password_confirmation' => 'required|string|min:6',
'department'     => 'required|string',
'contact_number' => ['required', 'digits:10'],
'role'           => 'required|string',
'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
// 'bank_name'      => 'nullable|string|max:255',
// 'account_number' => 'required_with:bank_name|string|max:50',
// 'ifsc'           => 'required_with:bank_name|string|max:20',
// 'account_type'   => 'required_with:bank_name|string|max:20',
]);
if ($request->hasFile('image')) {
if ($user->image && \Storage::disk('public')->exists($user->image)) {
\Storage::disk('public')->delete($user->image);
}
$user->image = $request->file('image')->store('profile_images', 'public');
}
$user->name            = $request->name;
$user->email           = $request->email;
$user->contact_number  = $request->contact_number;
$user->department      = $request->department;
$user->role            = $request->role;
$user->bank_name       = $request->bank_name;
$user->account_number  = $request->account_number;
$user->ifsc_code       = $request->ifsc;
$user->account_type    = $request->account_type;
if ($request->filled('password')) {
$user->password = $request->password;
}
$user->save();
return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
}
public function destroy($id)
{
try {
$ledgerMaster = Admin::findOrFail($id); 
$ledgerMaster->delete();
return back()->with('success', 'User deleted successfully.');
} catch (\Exception $e) {
return back()->with('error', 'Something went wrong! ' . $e->getMessage());
}
}
public function show($id)
{
$user = Admin::findOrFail($id); 
return view('admin.users.view', compact('user'));
}
public function toggleStatus($id)
{
    $user = Admin::findOrFail($id);

    // Toggle status
    $user->status = $user->status ? 0 : 1;
    $user->save();

    $statusText = $user->status ? 'activated' : 'deactivated';
    return redirect()->back()->with('success', "User has been $statusText successfully.");
}

}