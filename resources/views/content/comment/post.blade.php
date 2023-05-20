<x-app-layout>
     <div class="mb-1">
        <p style="font-size: 25px;" class="text-dark mb-0 float-start"> <i class="text-info fa fa-list-squares"></i> Post List:
        </p>
        <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm  float-end"> <i class="fa fa-plus"></i> Add New</a>
        <a href="{{ route('post.trashList') }}" class="btn btn-sm border-danger text-danger float-end mx-2" title="Trash List"><i class="fa fa-trash"></i> Trash List</a>
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
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $key=>$post)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $post->images }}</td>
                <td>{!! Str::limit($post->title, 15, ' ...') !!}</td>
                <td>{!! Str::limit($post->sub_title, 20, ' ...') !!}</td>
                <td>{!! Str::limit($post->description, 20, ' ...') !!}</td>
                <td>{{ $post->created_at }}</td>
                <td class="status">
                    <div class="form-check form-switch">
                        <input class="form-check-input toggleStatus" data-id="{{ $post->id }}" data-url="{{ route('post.status', $post->id) }}" type="checkbox" {{ $post->is_active ? 'checked' : '' }}>
                    </div>
                </td>
                <td class="text-center">
                    <a data-bs-toggle="tooltip" data-bs-placement="top" href="{{ route('post.edit', $post->id) }}" title="edit post" class="btn btn-sm text-info bg-light shadow border-info"> <i class="fa fa-edit"></i></a>
                    <form class="d-inline" action="{{ route('post.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Delete database post" type="submit" class="btn btn-sm border-danger text-danger shadow "><i class="fa fa-trash"></i></button>
                    </form>
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

        $(document).on('click', '.backup-btn', function() {
            if (window.confirm('Are you sure that you wanna execute backup') == false) {
                return false;
            }

            let key = $(this).data('id');
            let url = $(this).data('url');
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
                    window.onbeforeunload = false;
                    toastr.success(response.data)
                })
                .catch((error) => {
                    deBounchButton(button);
                    window.onbeforeunload = false;
                    toastr.error(error.response.data)
                })
        })

        $(document).on('click', '.toggleStatus', function() {
            let data_id = $(this).data('id');
            let url = $(this).data('url');
            var status = $(this).is(':checked') ? 1 : 0;
            var previousStatus = $(this).is(':checked') == false ? true : false;

            if (window.confirm('Are you sure to change active status ?') == false) {
                return false;
            }

            axios.post(url, {
                    id: data_id,
                    is_active: status
                })
                .then((response) => {
                    toastr.success(response.data);
                })
                .catch((error) => {
                    toastr.error(error.response.data);
                    if (previousStatus) {
                        $(this).prop('checked', 'true');
                    } else {
                        $(this).attr('checked', 'false');
                    }
                })
        })
    </script>
    @endpush
</x-app-layout>
