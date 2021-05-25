@push('js')
    <script>
        function confirmDelete(id) {
            if(confirm('are you sure you want to delete this ?')) {
            document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
    
@endpush