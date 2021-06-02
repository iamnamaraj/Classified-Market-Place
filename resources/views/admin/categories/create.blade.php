@extends('adminlte::page')

@section('title', 'Add New Category')

@push('js')
<script>
    

    $('#name').keyup(function() {
         let title = document.getElementById('name').value;

        if(title == '') {
            $('#slug-suggest').hide();
        }
         $.ajax({url: "{{ route('admin.categories.slug') }}", 
         data: { title: title },
         success: function(result){

                 $("#slug-suggest").slideDown();
                 $("#slug-title").text(result);
             }
        });
    });


    $('#slug-title').on('click', function(e) {
        e.preventDefault();

        $('#slug').val($('#slug-title').text());
    })  
</script>
    
@endpush

@section('content')
<div class="card">

    <div class="card-header">
        <h3 class="card-title text-bold" style="font-size: 1.3rem; lin-height: 1.5">
        Add New Category
        </h3>

        <div class="card-tools">
           <a href="{{ route('admin.categories.index') }}" class="btn btn-primary btn-sm">Go Back
           </a>

        </div>

    </div>
    <div class="card-body">
        
        <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
            @csrf

           <x-input
                field="name"
                text="Name"
            /> 
            <x-input
                field="slug"
                text="URL Slug"
            /> 

            <div class="form-test mb-3 text-muted" style="display:none" id="slug-suggest">
                suggestion: <a href="#" id="slug-title"></a>
            </div>



            <div class="form-group">
                <label for="category_id">Parent Category</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    @foreach ($categories as $cat)
                        <option
                            value="{{ $cat->id }}"
                            @if (old('category_id') == $cat->id) selected @endif>
                            
                            {{ $cat->name }}
                        
                        </option>
                     @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">

                <i class="fas fa-fw fa-save mr-2"></i>
                <span>Save</span>
                
            </button>


        </form>

    </div>

</div>
@endsection

