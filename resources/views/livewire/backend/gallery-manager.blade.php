<div class="container mx-auto p-4">


    <div class="form-container">
        <h1>Upload Image</h1>

        @if(session('success'))
        <div class="success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="photo">Image</label>
                <input type="file" name="photo" id="photo" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description">{{ old('description') }}</textarea>
            </div>

            <button type="submit">Upload Image</button>
        </form>
    </div>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 2rem;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        input[type="file"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            background: #007bff;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .success {
            color: #28a745;
            margin-bottom: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
        }

        th,
        td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #f8f9fa;
            font-weight: 600;
        }

        .img-thumb {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }

        .table-container {
            margin-top: 2rem;
        }

        tr:hover {
            background: #f8f9fa;
        }

    </style>

    @if($images->count() > 0)
    <div class="table-container">
        <h2>Uploaded Images</h2>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Uploaded</th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
                <tr>
                    <td>
                        <img src="{{ asset($image->url) }}" alt="{{ $image->title }}" class="img-thumb">
                    </td>
                    <td>{{ $image->title }}</td>
                    <td>{{ Str::limit($image->description, 50) }}</td>
                    <td>{{ $image->created_at->format('M j, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
