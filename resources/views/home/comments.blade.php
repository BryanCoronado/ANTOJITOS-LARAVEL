            <!-- Comments Section -->
            <!-- Comentarios Section -->
            <div class="container mt-5 p-4 border rounded">
    <h1 class="display-4 text-center text-orange mb-4">Comentarios</h1>

    <!-- Formulario de Comentario con efecto 3D -->
    <div class="d-flex justify-content-center mb-4">
        <form action="{{url('add_comment')}}" method="POST" class="w-75">
            @csrf
            <div class="form-group">
                <label for="comment" class="sr-only">Deja tu comentario</label>
                <textarea name="comment" class="form-control mb-3 shadow-sm" rows="3" placeholder="Deja tu comentario"></textarea>
            </div>
            <button type="submit" class="btn btn-orange btn-3d">Comentar</button>
        </form>
    </div>

    <!-- Todos los comentarios -->
    <h2 class="h4 mb-3">Todos los comentarios</h2>

    @foreach($comment as $comment)
    <div class="mb-4">

        <!-- Comentario con efecto 3D -->
        <div class="bg-dark text-light p-3 rounded mb-2 comment-container">
            <h5 class="font-weight-bold text-orange">{{$comment->name}}</h5>
            <p class="parrafo font-italic">{{$comment->comment}}</p>
            <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}" class="btn btn-primary">Responder</a>
        </div>

        <!-- Respuestas con efecto 3D -->
        @foreach($reply as $rep)
        @if($rep->comment_id==$comment->id)
        <div class="ml-4 bg-secondary text-dark p-3 rounded reply-container">
            <h6 class="font-weight-bold text-orange">{{$rep->name}}</h6>
            <p class="parrafo">{{$rep->reply}}</p>
            <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}" class="btn btn-primary">Responder</a>
        </div>
        @endif
        @endforeach
    </div>
    @endforeach

    <!-- Formulario de Respuesta con efecto 3D (oculto por defecto) -->
    <div style="display: none;" class="replyDiv text-center">
        <form action="{{url('add_reply')}}" method="POST" class="w-75 mx-auto">
            @csrf
            <input type="text" id="commentId" name="commentId" hidden="">
            <div class="form-group">
                <label for="reply" class="sr-only">Respondiendo</label>
                <textarea name="reply" class="form-control mb-3 shadow-sm" rows="3" placeholder="Respondiendo"></textarea>
            </div>
            <button type="submit" class="btn btn-orange btn-3d">Responder</button>
            <a href="javascript:void(0);" onclick="reply_close(this)" class="ml-2 text-orange">Cerrar</a>
        </form>
    </div>
</div>

<style>
    /* Efecto 3D para los botones */
    .btn-3d {
        transform: perspective(1px) translateZ(0);
        transition-duration: 0.3s;
        transition-property: transform;
        transform-origin: top;
    }

    .btn-3d:hover,
    .btn-3d:focus,
    .btn-3d:active {
        transform: scale(1.1);
    }

    /* Efecto 3D para los comentarios y respuestas */
    .comment-container,
    .reply-container {
        transform: perspective(1px) translateZ(0);
        transition-duration: 0.3s;
        transition-property: transform;
        transform-origin: top;
    }

    .comment-container:hover,
    .reply-container:hover {
        transform: scale(1.05);
    }

    .parrafo{
        color:white ;
        font-family: arial !important;
    }

    /* Color naranja personalizado */
    .text-orange {
        color: #FFA500;
    }

    .btn-orange {
        background-color: #FFA500;
        border-color: #FFA500;
        color: #fff;
    }

    .btn-orange:hover,
    .btn-orange:focus,
    .btn-orange:active {
        background-color: #FF8C00;
        border-color: #FF8C00;
        color: #fff;
    }

    /* Estilos para los inputs */
    input[type="text"],
    textarea {
        border: 1px solid #ced4da;
        border-radius: 5px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    input[type="text"]:focus,
    textarea:focus {
        border-color: #FFA500;
        box-shadow: 0 0 0 0.2rem rgba(255, 165, 0, 0.25);
    }
</style>
