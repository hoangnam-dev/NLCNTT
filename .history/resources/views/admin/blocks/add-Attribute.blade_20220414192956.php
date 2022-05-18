<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="attr_form" data-url="{{ route('admin.attributes.attribute-storeDetail') }}" method="POST">
                    @csrf

                    {{-- <input type="hidden" id="attr_id" data-attr_id=""> --}}
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="attr_value" placeholder="Nhập giá trị thuộc tính"
                            required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="add_attr" data-id="" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>

{{-- @section('js')
<script>
    $('#add_attr').on('click', function() { 
    var attrID = $(this).data('id');
    var url = $('#attr_form').data('url');
    var attrValue = $('#attr_value').val();
    alert(attrID+' === '+attrValue+' === '+url);
    $.ajax({
      type: "POST",
      url: url,
      data: {
        'matt': attrID,
        'giatri': attrValue
      },
      dataType: "dataType",
      success: function (response) {
        if (response.status == 'success') {
          $('#msg').html('').append('Thêm thuộc tính thành công');
          location.reload();
        }
      }
    });
  });
</script>
@endsection --}}