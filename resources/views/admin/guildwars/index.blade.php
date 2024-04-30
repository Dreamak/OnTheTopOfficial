@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Guerres de Guildes</h1>
    <!-- Bouton pour ouvrir le modal d'ajout -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGuildWarModal">
        Ajouter une Guerre
    </button>

    <!-- Modal d'ajout -->
    <div class="modal fade" id="addGuildWarModal" tabindex="-1" role="dialog" aria-labelledby="addGuildWarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGuildWarModalLabel">Ajouter une nouvelle guerre de guilde</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.guildwars.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="warImage" class="form-label">Image de la guerre</label>
                            <input type="file" class="form-control" id="warImage" name="image">
                        </div>
                        <div class="form-group">
                            <label for="enemy1" class="form-label">Ennemi 1</label>
                            <select name="enemy1" id="enemy1" class="form-control" required>
                                @foreach($guilds as $guild)
                                <option value="{{ $guild->id }}">{{ $guild->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="enemy2" class="form-label">Ennemi 2</label>
                            <select name="enemy2" id="enemy2" class="form-control" required>
                                @foreach($guilds as $guild)
                                <option value="{{ $guild->id }}">{{ $guild->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="enemy3" class="form-label">Ennemi 3</label>
                            <select name="enemy3" id="enemy3" class="form-control" required>
                                @foreach($guilds as $guild)
                                <option value="{{ $guild->id }}">{{ $guild->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <table class="table">
        <thead>
            <tr>
                <th>Ennemis</th>
                <th>Image</th>
                <th>Date</th>
                <th>Result</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wars as $war)
            <tr>
                <td>{{ $war->enemy1->name }} <br />
                    {{ $war->enemy2->name }} <br />
                    {{ $war->enemy3->name }}</td>
                    <td>
                        @if($war->image)
                            <img src="{{ Storage::url($war->image) }}" alt="Image de guerre" style="width:100px;"> <!-- Affichez l'image ici -->
                        @else
                            Pas d'image
                        @endif
                    </td>
                <td>{{ $war->date }}</td>
                <td>{{ $war->result }}</td>
                <td>
                    <!-- Bouton pour ouvrir le modal de modification -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editGuildWarModal-{{ $war->id }}">
                        Modifier
                    </button>

                    <!-- Modal de modification -->
                    <div class="modal fade" id="editGuildWarModal-{{ $war->id }}" tabindex="-1" role="dialog" aria-labelledby="editGuildWarModalLabel-{{ $war->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editGuildWarModalLabel-{{ $war->id }}">Modifier la guerre de guilde</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.guildwars.update', $war->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="date-{{ $war->id }}">Date</label>
                                            <input type="date" class="form-control" id="date-{{ $war->id }}" name="date" value="{{ $war->date }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="warImage-{{ $war->id }}">Image de la guerre</label>
                                            <input type="file" class="form-control" id="warImage-{{ $war->id }}" name="image">
                                            @if($war->image)
                                                <div class="mt-2">
                                                    <img src="{{ Storage::url($war->image) }}" alt="Image actuelle" style="width:100px;">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="enemy1-{{ $war->id }}">Ennemi 1</label>
                                            <select name="enemy1" id="enemy1-{{ $war->id }}" class="form-control" required>
                                                @foreach($guilds as $guild)
                                                    <option value="{{ $guild->id }}" {{ $guild->id == $war->enemy_id_1 ? 'selected' : '' }}>{{ $guild->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="enemy2-{{ $war->id }}">Ennemi 2</label>
                                            <select name="enemy2" id="enemy2-{{ $war->id }}" class="form-control" required>
                                                @foreach($guilds as $guild)
                                                    <option value="{{ $guild->id }}" {{ $guild->id == $war->enemy_id_2 ? 'selected' : '' }}>{{ $guild->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="enemy3-{{ $war->id }}">Ennemi 3</label>
                                            <select name="enemy3" id="enemy3-{{ $war->id }}" class="form-control" required>
                                                @foreach($guilds as $guild)
                                                    <option value="{{ $guild->id }}" {{ $guild->id == $war->enemy_id_3 ? 'selected' : '' }}>{{ $guild->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-info">Mettre à jour</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image de la guerre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" id="modalImage" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const images = document.querySelectorAll('.table img.img-thumbnail');
        images.forEach(image => {
            image.addEventListener('click', function () {
                const imageSrc = this.getAttribute('src');
                const modalImage = document.getElementById('modalImage');
                modalImage.src = imageSrc;
                $('#imageModal').modal('show');
            });
        });
    });
</script>
@endsection
