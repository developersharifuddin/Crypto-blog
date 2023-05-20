<x-app-layout>

    <div class="card col-md-6 offset-md-3">
        <div class="card-header">New Connection</div>
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="title" class="form-label">title</label>
                        <input type="text" name="title" class="form-control" id="title"
                            placeholder="title">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="sub_title" class="form-label">sub_title</label>
                        <input type="text" name="sub_title" class="form-control" id="sub_title"
                            placeholder="sub_title">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="description" class="form-label">description</label>
                        <input type="text" name="description" class="form-control" id="description"
                            placeholder="description">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="logo" class="form-label">logo</label>
                        <input type="text" name="logo" class="form-control" id="logo"
                            placeholder="logo">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="images" class="form-label">images</label>
                        <input type="text" name="images" class="form-control" id="images"
                            placeholder="images">
                    </div>

                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
