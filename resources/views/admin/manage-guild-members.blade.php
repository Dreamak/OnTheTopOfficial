@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Guild member: {{ $guild->name }}</h1>
    <hr>
    <!-- Formulaire pour ajouter un nouveau membre -->
    <div class="mb-4">
        <form action="{{ route('guilds.add-member', $guild->id) }}" method="POST" class="row justify-content-between form-inline">
            @csrf
            <div class="col-4 form-group my-3">
                <select name="member_id" id="member_id" class="form-control">
                    @foreach ($nonGuildMembers as $member)
                        <option value="{{ $member->id }}">{{ $member->ingame_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary col-3 m-3">Add</button>
        </form>
    </div>

        @foreach ($guild->members as $member)
        <div class="card border-secondary shadow mb-2">
            <div class="card-body row justify-content-between">
                <form method="POST" action="{{ route('member.update', $member) }}" class="d-flex align-items-center row align-items-center justify-content-around col-11">
                    @csrf
                    @method('PATCH')
                    <div class="row form-group mb-0 col-10 align-self-center">
                        <div class="form-floating col-5 align-self-center">
                            <input type="text" name="power" class="form-control d-inline-block" style="width: auto;" value="{{ $member->ingame_name }}" disabled readonly>
                            <label class=" col-5 mr-2">Name</label>
                        </div>
                        <div class="form-floating col-5 align-self-center">
                            <input type="text" name="power" class="form-control d-inline-block" style="width: auto;" value="{{ $member->power->power }}">
                            <label class="form-label">Power</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info mr-2 col align-self-center">Update</button>
                </form>
                <form class="float-end pl-3 col align-self-start me-auto" action="{{ route('members.remove-from-guild', $member->id) }}" method="POST">
                    @csrf
                    @method('PATCH') <!-- Ou DELETE si applicable -->
                    <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </form>
            </div>
        </div>
        @endforeach
</div>
@endsection
