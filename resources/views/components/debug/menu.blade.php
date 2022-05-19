<style>
    /* unvisited link */
    a:link {
        color: black;
        font-size: 20px
    }

    /* visited link */
    a:visited {
        color: green;
    }

    /* mouse over link */
    a:hover {
        color: hotpink;
    }

    /* selected link - braucht eine "active" Steuerung*/
    a:active {
        color: blue;
    }

    .disabled {
        pointer-events: none
    }

</style>

<script></script>

<a href="/debug">Overview</a>
<a href="/debug/debug">Redirect</a>
<blockquote></blockquote>

<a href="/info/db">Database Connection</a>
<a href="/debug/php">PHP Info</a>
<a href="debug/env">Environement Part</a>
<a href="/debug/env2">Environement Full</a>
<blockquote></blockquote>

<a href="/info/template">template</a>
<a href="/debug/path">paths</a>
<a href="/debug/views">views</a>
<a href="/debug/controllers">controllers</a>
<blockquote></blockquote>

<a class="disabled" href="/route:list">Route-List(apih)</a>
<a href="/telescope">Telescope</a>
<a class="disabled" href="">Swagger</a>
<blockquote></blockquote>

<a href="/info/user">user-person</a>
<blockquote></blockquote>
<br>
<p>Image-1a: yield, public</p>
<a href="/upload">upload</a>
<a href="/show">show</a>
<p>Image-2b: components, storage</p>
<a href="/image">index</a>
<blockquote></blockquote>
<br>
{{-- <a href="/image-change"></a>
<a href="image-edit"></a>
<a href="image-show"></a>
<a href="image-delete"></a> --}}
<!-- THEN:update:bild ändern, edit:Bildname ändern, show:Bild ansehen Destroy:Image löschen-->
