namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class AdminController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('admin.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->phone = $request->phone;
        $ticket->save();

        return redirect('/admin/tickets')->with('success', 'Ticket updated successfully!');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect('/admin/tickets')->with('success', 'Ticket deleted successfully!');
    }
}
