@extends('layouts.app')

@section('content')
<div class="container">

    <table style="max-width: 600px; padding: 10px; margin: 0 auto; border-collapse: collapse;">

        <tr>
            <td style="text-align: center;">
                <p style="font-family: Poppins Sans-serif,sans-serif; color: #96D293; font-weight: bold; font-size: 55px; margin: 5px;">
                    Bienvenido</p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <p style="font-family: Poppins Sans-serif,sans-serif; font-size: 40px; margin: 0;">¡Gracias por
                    registrarte!</p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            <p style="font-family: Poppins Sans-serif,sans-serif; font-size: 19px; line-height: 36px; text-align: justify;
                    color: #263238; padding: 10px;">Un link de verificación ha sido enviado a su cuenta de email</p>
                        </div>
                    @endif

                    <p style="font-family: Poppins Sans-serif,sans-serif; font-size: 19px; line-height: 36px; text-align: justify;
                    color: #263238; padding: 10px;" class="text-center">Antes de proceder, por favor chequee el link de verificación en su cuenta de email. <br>
                  <strong>  Si no recibiste el email, </strong><br></p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-principal">{{ __('click here to request another') }}</button>.
	                </form>
                </div>
            </td>
        </tr>
        <tr style="margin-bottom: 100px">
            <td style="text-align: center;">
                <p style="font-family: Poppins Sans-serif,sans-serif; font-size: 23px;">El equipo de <b>teloregalo</b>
                    <img style="max-width: 50px; height: auto; margin-left: 15px; margin-top: 15px;" alt="Logo Te lo regalo"
                         src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzU2IiBoZWlnaHQ9IjM0MSIgdmlld0JveD0iMCAwIDM1NiAzNDEiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+DQo8cGF0aCBkPSJNMzU1LjI0NyAxOTUuNzc4QzM1Mi44MzcgMTg2Ljk5NCAzNDQuMDMgMTc4Ljk1NyAzMzAuMjE2IDE4MC41NDZWODYuOTA4N0MzMzcuNjMzIDg2LjYyODQgMzQzLjU2NiA4MC40NjA3IDM0My41NjYgNzIuODkxMlY0NS41MTAzQzM0My41NjYgMzcuNzUzOSAzMzcuMzU1IDMxLjQ5MjcgMzI5LjY2IDMxLjQ5MjdIMzA2Ljc2MUwyOTQuMjQ1IDkuNjI1MzhDMjkxLjY0OSA1LjEzOTc2IDI4Ny41NyAxLjk2MjQ2IDI4Mi41NjQgMC42NTQxNTJDMjc3LjU1OCAtMC42NTQxNTIgMjcyLjM2NiAwIDI2OC4wMDkgMi42MTY2MUwyMTguMzE3IDMxLjU4NjJIMjAyLjc0MkwxNTIuOTU4IDIuNjE2NjFDMTQ4LjUwOCAwIDE0My4zMTYgLTAuNjU0MTUyIDEzOC40MDMgMC42NTQxNTJDMTMzLjM5NiAxLjk2MjQ2IDEyOS4zMTcgNS4yMzMyMSAxMjYuNzIxIDkuNjI1MzhMMTE0LjIwNiAzMS40OTI3SDkxLjMwNjdDODMuNjExOSAzMS40OTI3IDc3LjQwMDQgMzcuNzUzOSA3Ny40MDA0IDQ1LjUxMDNWNzIuODkxMkM3Ny40MDA0IDgwLjQ2MDcgODMuMzMzNyA4Ni41MzQ5IDkwLjc1MDQgODYuOTA4N1YxODIuNzg5QzY4Ljc3ODUgMTg4LjAyMiA1MS4zNDk0IDIwMC44MjUgMzcuODEzOSAyMjEuNjY0QzMzLjkyMDIgMjE4LjY3NCAyOS4yODQ4IDIxNi44OTggMjQuMjc4NSAyMTYuNzExQzE3Ljk3NDQgMjE2LjQzMSAxMi4wNDEgMjE4LjY3NCA3LjQwNTYgMjIyLjk3MkMtMi4wNTA2NSAyMzEuODUgLTIuNjA2OSAyNDYuODAyIDYuMjkzMSAyNTYuMzM0TDc3LjY3ODUgMzMzLjQzQzgyLjMxNCAzMzguMzgzIDg4LjUyNTQgMzQwLjkwNiA5NC44Mjk2IDM0MC45MDZDMTAwLjU3OCAzNDAuOTA2IDEwNi4zMjUgMzM4Ljg1MSAxMTAuNzc1IDMzNC41NTJDMTE1LjMxOCAzMzAuMjUzIDExOC4wMDcgMzI0LjM2NiAxMTguMTkyIDMxOC4xMDVDMTE4LjM3OCAzMTEuODQzIDExNi4xNTMgMzA1Ljc2OSAxMTEuODg4IDMwMS4xOUwxMDkuMjkyIDI5OC4zODdMMTI2LjYyOSAyNzEuNTY2TDE2Ni43NzEgMjczLjQzNUMxOTYuNDM4IDI3NC44MzcgMjA1Ljg5NCAyNzMuMzQyIDIzNC4zNTYgMjYyLjk2OUMyNTYuMzI4IDI1NC45MzIgMjgzLjg2MiAyNDMuOTk5IDMwNS45MjcgMjM1LjIxNEMzMjEuNzggMjI4Ljk1MyAzMzUuNDA4IDIyMy41MzMgMzQwLjUwNyAyMjEuNzU3QzM0MC41MDcgMjIxLjc1NyAzNDAuNTA3IDIyMS43NTcgMzQwLjU5OSAyMjEuNzU3QzM1My43NjQgMjE3LjM2NSAzNTcuODQzIDIwNS4zMSAzNTUuMjQ3IDE5NS43NzhaTTMyOS42NiA3Mi44OTEySDI0Mi4xNDNWNDUuNTEwM0gzMjkuNjZWNzIuODkxMlpNMTkyLjczIDg2LjkwODdIMjI4LjIzN1YxMzYuODExTDIxMi40NzYgMTMxLjk1MkMyMTEuMTc5IDEzMS41NzggMjA5LjY5NSAxMzEuNTc4IDIwOC4zOTcgMTMxLjk1MkwxOTIuNjM3IDEzNi44MTFWODYuOTA4N0gxOTIuNzNaTTE5Mi43MyA3Mi44OTEyVjQ1LjUxMDNIMjI4LjIzN1Y3Mi44OTEySDE5Mi43M1pNMjc0Ljk2MiAxNC43NjUxQzI3Ni4xNjcgMTQuMDE3NSAyNzcuNjUgMTMuODMwNiAyNzkuMDQxIDE0LjIwNDRDMjgwLjQzMiAxNC41NzgyIDI4MS41NDQgMTUuNDE5MyAyODIuMjg2IDE2LjcyNzZMMjkwLjgxNSAzMS41ODYySDI0Ni4yMjJMMjc0Ljk2MiAxNC43NjUxWk0xMzguNjgxIDE2LjcyNzZDMTM5LjQyMiAxNS41MTI3IDE0MC41MzUgMTQuNTc4MiAxNDEuOTI1IDE0LjIwNDRDMTQzLjMxNiAxMy44MzA2IDE0NC43MDcgMTQuMDE3NSAxNDYuMDA1IDE0Ljc2NTFMMTc0LjgzNyAzMS41ODYySDEzMC4yNDRMMTM4LjY4MSAxNi43Mjc2Wk05MS4zMDY3IDQ1LjUxMDNIMTc4LjgyM1Y3Mi44OTEySDE3Mi4yNDFDMTY4LjQ0IDcyLjg5MTIgMTY1LjI4OCA3Ni4wNjg1IDE2NS4yODggNzkuOUMxNjUuMjg4IDgzLjczMTQgMTY4LjQ0IDg2LjkwODcgMTcyLjI0MSA4Ni45MDg3SDE3OC44MjNWMTQ2LjM0M0MxNzguODIzIDE0OC41ODYgMTc5Ljg0MyAxNTAuNjQyIDE4MS42MDUgMTUxLjk1QzE4My4zNjYgMTUzLjI1OCAxODUuNjg0IDE1My42MzIgMTg3LjgxNiAxNTIuOTc4TDIxMC41MyAxNDUuOTY5TDIzMy4yNDMgMTUyLjk3OEMyMzMuODkyIDE1My4xNjUgMjM0LjYzNCAxNTMuMjU4IDIzNS4yODMgMTUzLjI1OEMyMzYuNzY2IDE1My4yNTggMjM4LjI0OSAxNTIuNzkxIDIzOS40NTUgMTUxLjg1N0MyNDEuMjE2IDE1MC41NDggMjQyLjIzNiAxNDguMzk5IDI0Mi4yMzYgMTQ2LjI1Vjg2LjkwODdIMzE2LjQwM1YxODMuNjNMMjYzLjE4OCAxOTYuMTUyQzI2MC45NjMgMTg1Ljk2NiAyNTEuNTA3IDE3OC44NjQgMjQxLjAzMSAxNzkuNzk4QzIzNy4zMjIgMTgwLjE3MiAyMjQuODA3IDE4MS40OCAyMTEuNTQ5IDE4Mi44ODJDMTk4Ljk0MSAxODQuMjg0IDE4NS44NjkgMTg1LjY4NiAxODIuMzQ2IDE4NS45NjZDMTc0LjgzNyAxODYuNjIgMTY1LjEwMyAxODUuMjE4IDE1My42OTkgMTgzLjUzNkMxMzguNTg4IDE4MS4yOTMgMTIxLjgwOCAxNzguODY0IDEwNC43NDkgMTgwLjQ1MlY4Ni45MDg3SDEwOS43NTZDMTEzLjU1NyA4Ni45MDg3IDExNi43MDkgODMuNzMxNCAxMTYuNzA5IDc5LjlDMTE2LjcwOSA3Ni4wNjg1IDExMy41NTcgNzIuODkxMiAxMDkuNzU2IDcyLjg5MTJIOTEuMzA2N1Y0NS41MTAzWk0xMDEuMjI2IDMyNC4zNjZDOTcuNDI1NCAzMjguMDEgOTEuMzA2NyAzMjcuNzMgODcuNzgzNyAzMjMuODk5TDE2LjM5ODMgMjQ2LjgwMkMxMi43ODI3IDI0Mi45NzEgMTMuMDYwOCAyMzYuODAzIDE2Ljg2MTkgMjMzLjI1MkMxOC43MTYgMjMxLjQ3NiAyMS4xMjY0IDIzMC41NDIgMjMuNzIyMyAyMzAuNjM1QzI2LjIyNTQgMjMwLjcyOSAyOC42MzU4IDIzMS44NSAzMC4zOTczIDIzMy43MTlMMTAxLjc4MyAzMTAuODE2QzEwMy41NDQgMzEyLjY4NSAxMDQuMzc5IDMxNS4xMTQgMTA0LjM3OSAzMTcuNzMxQzEwNC4xOTMgMzIwLjI1NCAxMDMuMTczIDMyMi42ODQgMTAxLjIyNiAzMjQuMzY2Wk0zMzYuMTQ5IDIwOC42NzRDMzMwLjY4IDIxMC41NDMgMzE3LjUxNSAyMTUuNzc3IDMwMC45MiAyMjIuMzE4QzI3OC45NDggMjMxLjEwMiAyNTEuNTA3IDI0MS45NDMgMjI5LjcyIDI0OS44ODZDMjAyLjkyOCAyNTkuNjA1IDE5NS40MTggMjYwLjgyIDE2Ny41MTMgMjU5LjUxMUwxMjMuMzg0IDI1Ny40NTVDMTIwLjk3MyAyNTcuMzYyIDExOC41NjMgMjU4LjU3NyAxMTcuMjY1IDI2MC42MzNMOTkuNjUwNCAyODcuODI3TDQ3LjgyNjQgMjMxLjg1Qzc1LjgyNDQgMTg2LjI0NiAxMTcuODIxIDE5Mi4zMjEgMTUxLjY2IDE5Ny4yNzNDMTYzLjM0MSAxOTguOTU2IDE3NC4zNzMgMjAwLjYzOCAxODMuNDU5IDE5OS43OTdDMTg3LjE2NyAxOTkuNDIzIDE5OS42ODMgMTk4LjExNSAyMTIuOTQgMTk2LjcxM0MyMjUuNTQ4IDE5NS4zMTEgMjM4LjYyIDE5My45MDkgMjQyLjIzNiAxOTMuNjI5QzI0Ni4wMzcgMTkzLjI1NSAyNDkuMzc0IDE5Ni4xNTIgMjQ5Ljc0NSAxOTkuODlDMjQ5LjgzOCAyMDEuMTA1IDI1MC4xMTYgMjA0LjI4MiAyNDEuNDAxIDIwNy45MjdDMjIyLjc2NyAyMTUuNzc3IDIwMy4wMiAyMjIuMzE4IDE4Ny4xNjcgMjI1Ljk2M0MxODMuNDU5IDIyNi44MDQgMTgxLjA0OCAyMzAuNTQyIDE4MS44ODMgMjM0LjM3M0MxODIuNzE3IDIzOC4xMTEgMTg2LjQyNSAyNDAuNTQxIDE5MC4yMjYgMjM5LjdDMjA2LjgyMSAyMzUuODY4IDIyNy40MDMgMjI5LjA0NyAyNDYuNzc5IDIyMS4wMUMyNTMuNDU0IDIxOC4yMDYgMjU3LjcxOCAyMTQuNzQ5IDI2MC4yMjEgMjExLjI5MUwzMzAuMDMxIDE5NC45MzdDMzM3LjQ0NyAxOTMuMzQ5IDM0MS4wNjMgMTk2LjMzOSAzNDEuOTkgMTk5LjcwM0MzNDIuNzMyIDIwMi43ODcgMzQxLjM0MSAyMDYuODA1IDMzNi4xNDkgMjA4LjY3NFoiIGZpbGw9IiMyRTJDMkMiLz4NCjxwYXRoIGQ9Ik0xNDAuOTE3IDg2LjkwOTRDMTQ0LjcxOCA4Ni45MDk0IDE0Ny44NyA4My43MzIxIDE0Ny44NyA3OS45MDA2QzE0Ny44NyA3Ni4wNjkxIDE0NC44MSA3Mi44OTE4IDE0MC45MTcgNzIuODkxOEMxMzcuMTE2IDcyLjg5MTggMTMzLjk2NCA3Ni4wNjkxIDEzMy45NjQgNzkuOTAwNkMxMzMuOTY0IDgzLjczMjEgMTM3LjExNiA4Ni45MDk0IDE0MC45MTcgODYuOTA5NFoiIGZpbGw9IiMyRTJDMkMiLz4NCjwvc3ZnPg0KIA=="/>
                </p>
            </td>
        </tr>
    </table>
</div>
@endsection
