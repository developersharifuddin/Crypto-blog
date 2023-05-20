<x-app-layout>
    <div class="d-flex justify-content-between align-items-center mb-1">
        <p style="font-size: 25px;" class="text-dark mb-0"> <i class="text-info fa fa-list-squares"></i> Trash List:
        </p>
    </div>

    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>SN</th>
                <th>Image</th>
                <th>title</th>
                <th>sub_title</th>
                <th>Description</th>
                <th>Created_at</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $key=>$post)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $post->image }}</td>
                <td>{!! Str::limit($post->title, 15, ' ...') !!}</td>
                <td>{!! Str::limit($post->sub_title, 20, ' ...') !!}</td>
                <td>{!! Str::limit($post->description, 20, ' ...') !!}</td>
                <td>{{ $post->created_at }}</td>
                <td class="text-center">
                    <button data-bs-toggle="tooltip" data-bs-placement="top" type="button"
                    data-url="{{ route('trashed.restore', $post->id) }}" data-id="{{ $post->id }}"
                     class="btn btn-sm bg-light shadow restore_btn text-success border-success" title="Restore">
                     <i class="fa-solid fa-rotate" aria-hidden="true"></i></button>
                    <button class="d-inline delete btn btn-sm border-danger text-danger shadow " id="delete-form-{{$post->id}}" data-url="{{ route('trashed.delete', $post->id) }}" data-id="{{ $post->id }}" method="POST" data-bs-toggle="tooltip" data-bs-placement="top" title="Parmanently Delete from database ?"><i class="fa fa-trash"></i></button>
                 </td>
            </tr>
            @empty
            <tr>
                <th colspan="8" class="text-center">NO record founds</th>
            </tr>
            @endforelse
        </tbody>
    </table>

    @push('script')
    <script>
    const prevDom = `<i class="fa fa-hard-drive" aria-hidden="true"></i>`;
        const spinnerDom =
            `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`;


        const bounchButton = (button) => {
            $(button).prop('disabled', 'true');
            $(button).html(spinnerDom);

        }

        const deBounchButton = (button) => {
            $(button).removeAttr('disabled');
            $(button).html(prevDom);

        }

        $(document).on('click', '.restore_btn', function() {
            if (window.confirm('Are you sure that you want to restore it?') == false) {
                return false;
            }
            let key = $(this).data('id');
            let url = $(this).data('url');
            //alert(key);
            bounchButton(this);
            var button = this;
            window.onbeforeunload = function() {
                return "Dude, are you sure you want to leave? Think of the kittens!";
            }

            axios.post(url, {
                    id: key
                })
                .then((response) => {
                    deBounchButton(button);
                    $('.preloader').css('display', 'none');
                    $(this).parents('tr').remove();
                    window.onbeforeunload = false;
                    toastr.success(response.data)
                })
                .catch((error) => {
                    deBounchButton(button);
                    window.onbeforeunload = false;
                    toastr.error(error.response.data)
                })
        })

        $(document).on('click', '.delete', function() {
            if (window.confirm('Are you sure that you want to Parmanently Delete it?') == false) {
                return false;
            }
            let data = $(this).data('id');
            let url = $(this).data('url');

            axios.post(url, {
                    id: data
                })
                .then((response) => {
                    $(this).parents('tr').remove();
                    toastr.success(response.data);
                })
                .catch((error) => {
                    toastr.error(error.response.data);
                })
        })
    </script>
    @endpush
</x-app-layout>
