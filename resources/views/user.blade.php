<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
        }

        .image-preview {
            width: 150px;
            height: 150px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Student Admission Form</h2>
            <form action="processForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                        required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                        required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile No.:</label>
                    <input type="text" class="form-control" id="mobile" name="mobile"
                        placeholder="Enter Mobile No." required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address"></textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Photo:</label>
                    <img id="photo-preview" class="image-preview" src="#" alt="Photo Preview"
                        style="display: none;">
                    <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*"
                        required onchange="previewImage(event, 'photo-preview')">
                </div>
                <div class="form-group">
                    <label for="signature">Signature:</label>
                    <img id="signature-preview" class="image-preview" src="#" alt="Signature Preview"
                        style="display: none;">
                    <input type="file" class="form-control-file" id="signature" name="signature" accept="image/*"
                        required onchange="previewImage(event, 'signature-preview')">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>

            @if ($message = Session::get('success'))
                @php
                    $filephoto = Session::get('photo');
                    $filesignature = Session::get('signature');
                @endphp
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                <img src="{{ asset('photo/' . $filephoto) }}" style="height:200px;">
                <img src="signature/{{ Session::get('signature') }}" style="height:200px;">
            @endif
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function previewImage(event, previewId) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById(previewId);
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>
