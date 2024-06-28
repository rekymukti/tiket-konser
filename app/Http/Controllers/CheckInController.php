namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class CheckInController extends Controller
{
    public function showForm()
    {
        return view('check-in');
    }

    public function checkIn(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,ticket_id',
        ]);

        $ticket = Ticket::where('ticket_id', $request->ticket_id)->first();

        if ($ticket->is_checked_in) {
            return redirect('/check-in')->with('error', 'Ticket has already been used.');
        }

        $ticket->is_checked_in = true;
        $ticket->save();

        return redirect('/check-in')->with('success', 'Check-in successful!');
    }
}
