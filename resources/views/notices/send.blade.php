<!-- resources/views/notices/send.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Send Notices</title>
</head>

<body>
    <h1>Send Notices</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
        <p>Student Name: {{ session('studentName') }}</p>
    @endif

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    @csrf
    <form method="post" action="{{ route('notices.send') }}">
        @csrf

        <label for="recipient">Recipient (Student's Personal Advisor):</label>
        <select name="recipient" id="recipient" onchange="updateMatricNo(this)">
            @foreach($students as $student)
                <option value="{{ optional($student->personalAdvisor)->id }}" data-matricno="{{ $student->matricNo }}">
                    {{ $student->studName }} (Personal Advisor: {{ optional($student->personalAdvisor)->name ?: 'No Personal Advisor' }})
                </option>
            @endforeach
        </select>

        <br>

        <!-- Hidden input field for matricNo -->
        <input type="hidden" name="matricNo" id="matricNo">

        <br>

        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="3"></textarea>

        <br>

        <button type="submit">Send Notice</button>
    </form>

    <script>
        // Update the hidden matricNo field based on the selected student
        function updateMatricNo(select) {
            var selectedOption = select.options[select.selectedIndex];
            var matricNoInput = document.getElementById('matricNo');
            matricNoInput.value = selectedOption.getAttribute('data-matricno');
        }
    </script>
</body>

</html>
