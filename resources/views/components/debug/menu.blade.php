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

<a href="/debug">{{ __('debug.overview') }}</a>
<a href="/debug/debug">{{ __('debug.redirect') }}</a>
<blockquote></blockquote>

<a href="/info/db">{{ __('debug.conn') }}</a>
<a href="/debug/php">{{ __('debug.phpinfo') }}</a>
<a href="/debug/env">{{ __('debug.env_part') }}</a>
<a href="/debug/env2">{{ __('debug.env_full') }}</a>
<blockquote></blockquote>

<a href="/info/template">{{ __('debug.template') }}</a>
<a href="/debug/path">{{ __('debug.path') }}</a>
<a href="/debug/views">{{ __('debug.view') }}</a>
<a href="/debug/controllers">{{ __('debug.contr') }}</a>
<blockquote></blockquote>

<a href="/route:list">{{ __('debug.rl') }}</a>
<a href="/debug/config">{{ __('debug.config') }}</a>
<a href="/info/lang">{{ __('debug.lang') }}</a>
<a href="/lang/lang_debug">{{ __('debug.lang_debug') }}</a>
<a href="/telescope">{{ __('debug.telescope') }}</a>
<a class="disabled" href="">{{ __('debug.swagger') }}</a>
<blockquote></blockquote>

<a href="/info/user">{{ __('debug.rel_view_1') }}</a>
<a href="/info/user">{{ __('debug.rel_view_2') }}</a>
<blockquote></blockquote>
<br>
<p>{{ __('debug.var1') }}</p>
<a href="/image">{{ __('debug.index') }}</a>
<a href="/image/create">{{ __('debug.upload') }}</a>
<a href="/image/edit/1">{{ __('debug.edit') }}</a>
<a href="/image/1">{{ __('debug.show') }}</a>
<a href="/image/change/1">{{ __('debug.change') }}</a>
<a href="/image/destroy/1">{{ __('debug.rm') }}</a>

<p>{{ __('debug.var2') }}</p>
<a href="/img">{{ __('debug.image') }}</a>
<blockquote></blockquote>
<br>
