namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketBookingController extends Controller
{
    public function showForm()
    {
        return view('book-ticket');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $ticket = new Ticket();
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->phone = $request->phone;
        $ticket->ticket_id = uniqid();
        $ticket->save();

        return redirect('/book-ticket')->with('success', 'Ticket booked successfully! Your ticket ID is ' . $ticket->ticket_id);
    }
}
