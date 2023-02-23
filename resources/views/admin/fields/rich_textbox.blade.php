@component($typeForm, get_defined_vars())
    <textarea id="textbox-{{$id}}" required {{ $attributes }}>
        {{ $value ?: "" }}
    </textarea>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#textbox-{{ $id }}',
            height: {{ $attributes['height'] }},
            menubar: false,
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tableofcontents footnotes autocorrect typography inlinecss',
            toolbar: 'blocks fontfamily fontsize | bold italic underline strikethrough forecolor backcolor| link image table | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            init_instance_callback: function (editor) {
                editor.on('keyup', function (e) {
                    if (document.getElementById("content")) {
                        $('#content').html(tinyMCE.activeEditor.getContent());
                    }
                });
            }
        });
    </script>
@endcomponent
