<!DOCTYPE html>
<html>

<head>
    <title>Pet Paws</title>
</head>

<body>
    <h1>Pet Consult Results</h1>

    <h3>Vet Comments: </h3>
    <p>{{ $details['comment'] }}</p>

    <h3>Pet Illness:</h3>
    <p>{{ $details['illness'] }}</p>

    <h3>Consultation Fee</h3>
    <p>PHP {{ $details['fee'] }}</p>

    <p>Thank you</p>
</body>

</html>