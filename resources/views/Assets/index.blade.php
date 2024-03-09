<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    @include('/Books/Navbar')

    <div class="container-fluid">
        
        <div class="row">

            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center" id="publisherHeadingContent">
                        <h2 class="mb-0">
                            <button class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#publisherAccordion" aria-expanded="true" aria-controls="publisherAccordion">
                                Publishers
                            </button>
                        </h2>
                        {{-- <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addPublisherModal" id="addPublisherBtn">
                            <i class="fas fa-plus"></i> Add Publisher
                        </button> --}}
                    </div>
            
                    <div id="publisherAccordion" class="accordion show" aria-labelledby="publisherHeadingContent" data-parent="#accordionExample">
                        <div class="card-body">
                            @foreach($publishers as $publisher)
                            <div class="card">
                                <div class="card-header" id="publisherHeading{{ $publisher->id }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#publisherCollapse{{ $publisher->id }}" aria-expanded="false" aria-controls="publisherCollapse{{ $publisher->id }}">
                                            {{ $publisher->name }}
                                        </button>
                                    </h2>
                                </div>
            
                                <div id="publisherCollapse{{ $publisher->id }}" class="collapse" aria-labelledby="publisherHeading{{ $publisher->id }}" data-parent="#publisherAccordion">
                                    <div class="card-body">
                                        <p><strong><i class="fas fa-user"></i> Name:</strong> {{ $publisher->name }}</p>
                                        <p><strong><i class="fas fa-map-marker-alt"></i> Address:</strong> {{ $publisher->address }}</p>
                                        <p><strong><i class="fas fa-phone"></i> Phone Number:</strong> {{ $publisher->phone_number }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center" id="categoryHeading">
                        <h2 class="mb-0">
                            <button class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#categoryAccordion" aria-expanded="true" aria-controls="categoryAccordion">
                                Categories
                            </button>
                        </h2>
                        <button id="addCategoryBtn" class="btn btn-success" type="button" data-toggle="modal" data-target="#addCategoryModal">
                            <i class="fas fa-plus"></i> Add Category
                        </button>
                    </div>
            
                    <div id="categoryAccordion" class="accordion collapse show" aria-labelledby="categoryHeading" data-parent="#categoryAccordion">
                        <div class="card-body">
                            <ul id="categoryList" class="list-group">
                                @foreach($categories as $category)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-folder"></i> {{ $category->name }}
                                    </div>
                                    <div>
                                        <button class="btn btn-primary btn-sm edit-category" data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        
                                        <button class="btn btn-danger btn-sm delete-category" id="deleteCategoryBtn" data-id="{{ $category->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>                
                    
                </div>
            </div>
            
            <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('assets.store') }}" method="POST">
                      @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="categoryName">Category Name:</label>
                          <input type="text" class="form-control" id="categoryName" name="name" required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editCategoryForm" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="editCategoryName">Category Name:</label>
                                    <input type="text" class="form-control" id="editCategoryName" name="name" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            

              
            
        </div>
    </div>

   
    <form id="deleteCategoryBook" method="POST">
        @csrf
        @method('DELETE')
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
         $(document).ready(function() {

            
            var successMessage = '{{ session("success") }}';
                if (successMessage) {
                    Swal.fire({
                        title: 'Success',
                        text: successMessage,
                        icon: 'success',
                        timer: 10000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                }

                $(document).on('click', '.edit-category', function() {
                    const categoryId = $(this).data('id');
                    const categoryName = $(this).data('name');

                    $('#editCategoryForm').attr('action', `/category/update/${categoryId}`);
                    $('#editCategoryName').val(categoryName);

                    $('#editCategoryModal').modal('show');
                });


                $(document).on('click', '.delete-category', function() {
                    const categoryId = $(this).data('id');
                    console.log('Delete category with ID:', categoryId);

                    Swal.fire({
                        title: 'Confirm Delete',
                        text: 'Are you sure you want to delete this category?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Delete',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                            fetch(`/category/${categoryId}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken 
                                },
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Category deleted successfully',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload();
                                });
                            })
                            .catch(error => {
                                console.error('There was a problem with your fetch operation:', error);
                            });
                        }
                    });
                });





            $('#addCategoryBtn').click(function() {

                $('#addCategoryModal').modal('show');
                    });

                    $('#saveCategoryBtn').click(function() {
                
                    var categoryName = $('#categoryName').val();
                    console.log(categoryName);
                    });
                });


            
                document.getElementById('addPublisherBtn').addEventListener('click', function() {
                    fetch('https://jsonplaceholder.typicode.com/posts/')
                        .then(response => response)
                        .then(data => {
                            console.log(data);
                            console.table(data.books);
                        })
                        .catch(error => console.error('Error:', error));
                });



                $(document).ready(function() {
    // Mengambil data buku dari server
    fetch('https://jsonplaceholder.typicode.com/posts/')
        .then(response => response.json())
        .then(data => {
            // Mengambil data jumlah buku per kategori
            const bookCounts = data.reduce((acc, curr) => {
                if (acc[curr.categoryId]) {
                    acc[curr.categoryId]++;
                } else {
                    acc[curr.categoryId] = 1;
                }
                return acc;
            }, {});

            // Mengonversi data buku menjadi format yang bisa digunakan oleh Chart.js
            const labels = Object.keys(bookCounts);
            const dataValues = Object.values(bookCounts);

            // Membuat grafik menggunakan Chart.js
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '# of Books',
                        data: dataValues,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error:', error));
});




    </script>
</body>
</html>
