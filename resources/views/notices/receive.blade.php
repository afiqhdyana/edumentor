<!-- resources/views/notices/receive.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Receive Notices</title>
</head>
<body>
    

<!-- Display All Notices (Received and Sent) -->
@if ($allNotices->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>From</th>
                <th>To</th>
                <th>Student</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allNotices as $notice)
                @if ($notice->recipient_id == auth()->user()->id && $notice->supervisor_id != auth()->user()->id)
                    <tr>
                        <td>{{ $notice->lecturer->name ?? 'N/A' }}</td>
                        <td>{{ $notice->recipient->name ?? 'N/A' }}</td>
                        <td>{{ $notice->student_name ?? 'N/A' }}</td>
                        <td>{{ $notice->complaint ?? 'N/A' }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@else
    <p>No notices available.</p>
@endif



</body>
</html>
