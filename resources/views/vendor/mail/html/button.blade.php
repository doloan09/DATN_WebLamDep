{{--@props([--}}
{{--    'url',--}}
{{--    'color' => 'primary',--}}
{{--    'align' => 'center',--}}
{{--])--}}
{{--<table class="action" align="{{ $align }}" width="100%" cellpadding="0" cellspacing="0" role="presentation">--}}
{{--<tr>--}}
{{--<td align="{{ $align }}">--}}
{{--<table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">--}}
{{--<tr>--}}
{{--<td align="{{ $align }}">--}}
{{--<table border="0" cellpadding="0" cellspacing="0" role="presentation">--}}
{{--<tr>--}}
{{--<td>--}}
{{--<a href="{{ $url }}" class="button button-{{ $color }}" target="_blank" rel="noopener">{{ $slot }}</a>--}}
{{--</td>--}}
{{--</tr>--}}
{{--</table>--}}
{{--</td>--}}
{{--</tr>--}}
{{--</table>--}}
{{--</td>--}}
{{--</tr>--}}
{{--</table>--}}

<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td align="center" bgcolor="#e6b07e" role="presentation" style="border:2px solid #e6b07e;border-radius:3px;cursor:auto;mso-padding-alt:8px 16px;background:#e6b07e;" valign="middle">
                                    <a href="{{ $url }}" style="display: inline-block; background: #e6b07e; color: white; font-family: Muli, Arial, sans-serif; font-size: 13px; font-weight: normal; line-height: 30px; margin: 0; text-decoration: none; text-transform: none; padding: 8px 16px; mso-padding-alt: 0px; border-radius: 3px;" target="_blank"> {{ $slot }} </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
