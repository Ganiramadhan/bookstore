<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


</head>
<body>
    @include('/Books/Navbar')

    <div class="container mt-4">

        <div id="accordion">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center" id="headingBooks">
                    
                    <h5 class="mb-0">

                        <button class="btn btn-link text-white d-flex justify-content-center align-items-center" type="button" data-toggle="collapse" data-target="#collapseBooks" aria-expanded="true" aria-controls="collapseBooks">
                            <span class="mr-2">BOOKS</span>
                            <i class="fas fa-book"></i>
                        </button>
                        
                    </h5>
                    <div>
                        <button type="button" class="btn btn-sm btn-success mt-4 mb-4" data-toggle="modal" data-target="#addBookModal">
                            <i class="fas fa-plus"></i> Add Book
                        </button>
                        
                    </div>
                </div>
                
                <div id="collapseBooks" class="collapse show" aria-labelledby="headingBooks" data-parent="#accordion">
                    <div class="card-body">
                        
                        <table id="books-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Book Code</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Publisher</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $key => $book)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $book->book_code }}</td>
                                    <td>{{ $book->category }}</td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ 'Rp ' . number_format($book->price, 0, ',', '.') }}</td>
                                    <td>{{ $book->stock }}</td>
                                    <td>{{ $book->publisher }}</td>
                                    <td> 
                                        <button type="button" class="btn btn-sm btn-primary edit-btn" data-toggle="modal" data-target="#editBookModal" data-id="{{ $book->id }}" data-category="{{ $book->category }}" data-book_code="{{ $book->book_code }}" data-name="{{ $book->name }}" data-price="{{ $book->price }}" data-stock="{{ $book->stock }}" data-publisher="{{ $book->publisher }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger delete-btn" data-toggle="modal" data-id="{{ $book->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    {{-- TAMBAH DATA  --}}
    <div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Add Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <!-- Form untuk menambahkan buku -->
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="book_code">Book Code</label>
                            <input type="text" class="form-control" id="book_code" name="book_code" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" id="stock" name="stock" required>
                        </div>
                        <div class="form-group">
                            <label for="publisher_id">Publisher</label>
                            <select class="form-control" id="publisher_id" name="publisher_id" required>
                                @foreach($publishers as $publisher)
                                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<!-- Modal Edit -->
<div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookModalLabel">Edit Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="editBookForm" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="edit_book_code">Book Code</label>
                        <input type="text" class="form-control" id="edit_book_code" name="book_code" required>
                    </div>
                    @method('PUT')
                    <input type="hidden" id="edit_book_id" name="id">

                    <div class="form-group">
                        <label for="edit_category">Category</label>
                        <select class="form-control " id="edit_category_id" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label for="edit_name">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_price">Price</label>
                        <input type="text" class="form-control" id="edit_price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_stock">Stock</label>
                        <input type="text" class="form-control" id="edit_stock" name="stock" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_publisher_id">Publisher</label>
                        <select class="form-control " id="edit_publisher_id" name="publisher_id" required>
                            @foreach($publishers as $publisher)
                                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <form id="deleteBookForm" method="POST">
        @csrf
        @method('DELETE')
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>

        $(document).ready(function() {
  
            $('#books-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });

            var successMessage = '{{ session("success") }}';
            if (successMessage) {
                Swal.fire({
                    title: 'Success',
                    text: successMessage,
                    icon: 'success',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            }
            
            $(document).on('click', '.edit-btn', function () {
                var id = $(this).data('id');
                var bookCode = $(this).data('book_code'); 
                var category = $(this).data('category');
                var name = $(this).data('name');
                var price = $(this).data('price');
                var stock = $(this).data('stock');
                var publisher = $(this).data('publisher');

                $('#edit_book_id').val(id);
                $('#edit_book_code').val(bookCode);
                $('#edit_category').val(category);
                $('#edit_name').val(name);
                $('#edit_price').val(price);
                $('#edit_stock').val(stock);
                $('#edit_publisher').val(publisher);

                var formAction = '{{ route("books.update", ["id" => "__id__"]) }}';
                formAction = formAction.replace('__id__', id);
                $('#editBookForm').attr('action', formAction);
            });

            $(document).on('click', '.delete-btn', function () {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Confirm Delete',
                    text: "Are you sure you want to delete this data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/books/' + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: response.success,
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload();
                                });
                            },
                            error: function (xhr, status, error) {
                                Swal.fire('Error!', 'An error occurred while deleting the data.', 'error');
                                console.error('An error occurred:', error);
                            }
                        });
                    }
                });
            });

            $(document).ready(function() {
    var ctx = document.getElementById('productStockChart').getContext('2d');
    var productStockChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Product A', 'Product B', 'Product C', 'Product D', 'Product E'],
            datasets: [{
                label: 'Stock',
                data: [100, 120, 90, 150, 200], // Data stok produk
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});


        });
    </script>
</body>
</html>
