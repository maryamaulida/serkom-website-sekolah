<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - SMK YPC Tasikmalaya</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #EFF1F6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .login-card {
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(30, 41, 59, .12);
            max-width: 980px;
            width: 100%;
        }

        /* Panel ilustrasi */
        .illus-panel {
            background: #F4F6FB;
            position: relative;
            min-height: 480px;
            overflow: hidden;
        }

        .illus-blob {
            position: absolute;
            top: 8%;
            left: 8%;
            width: 84%;
            height: 78%;
            background: #E7EBF5;
            border-radius: 45% 55% 60% 40% / 55% 45% 55% 45%;
        }

        .illus-floor {
            position: absolute;
            bottom: 14%;
            left: 6%;
            width: 88%;
            height: 16px;
            background: #1B1F2A;
            border-radius: 50%;
            filter: blur(0.3px);
        }

        /* Panel form */
        .form-panel {
            padding: 56px;
        }

        @media (max-width: 767.98px) {
            .illus-panel {
                display: none;
            }

            .form-panel {
                padding: 40px 28px;
            }
        }

        .login-title {
            font-weight: 700;
            font-size: 30px;
            color: #1B1F2A;
        }

        .login-subtitle {
            color: #6B7280;
            font-size: 14px;
        }

        .flat-input {
            position: relative;
        }

        .flat-input input {
            width: 100%;
            background: #F2F3F7;
            border: none;
            border-radius: 10px;
            padding: 15px 44px 15px 18px;
            font-size: 14px;
            color: #1B1F2A;
        }

        .flat-input input::placeholder {
            color: #9CA0AF;
        }

        .flat-input input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, .18);
        }

        .field-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #6B7280;
            background: none;
            border: none;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .btn-login {
            border: none;
            border-radius: 999px;
            padding: 14px;
            font-weight: 600;
            font-size: 15px;
            color: #fff;
            background: linear-gradient(90deg, #6FA8F0 0%, #3C7CE0 100%);
            transition: filter .15s ease;
        }

        .btn-login:hover {
            filter: brightness(1.05);
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="login-card d-flex flex-row">

        <!-- Panel ilustrasi -->
        <div class="illus-panel col-md-6 d-none d-md-block">

            <div class="illus-blob"></div>
            <div class="illus-floor"></div>

            <svg viewBox="0 0 460 480"
                class="position-absolute"
                style="width:100%; height:100%; left:0; top:0;">

                <!-- Meja -->
                <rect x="60" y="300" width="260" height="10" rx="3" fill="#C99A6C" />
                <rect x="72" y="310" width="8" height="90" fill="#3A3F52" />
                <rect x="300" y="310" width="8" height="90" fill="#3A3F52" />

                <!-- Buku -->
                <rect x="60" y="270" width="70" height="14" rx="2" fill="#E7E9F0" />
                <rect x="60" y="284" width="70" height="12" rx="2" fill="#D7DBE6" />
                <rect x="130" y="255" width="16" height="45" rx="2" fill="#4A7CE0" />

                <!-- Laptop -->
                <rect x="150" y="255" width="90" height="55" rx="4" fill="#2C3142" />
                <rect x="156" y="261" width="78" height="40" rx="2" fill="#4A90E2" />
                <rect x="145" y="308" width="100" height="8" rx="2" fill="#3A3F52" />

                <!-- Lampu meja -->
                <rect x="330" y="230" width="4" height="80" fill="#B0B4C2" />
                <path d="M310 200 L350 200 L340 230 L320 230 Z"
                    fill="#EDEFF4"
                    stroke="#C6CAD6"
                    stroke-width="1.5" />
                <circle cx="330" cy="310" r="10" fill="#C6CAD6" />

                <!-- Tanaman -->
                <rect x="248" y="285" width="20" height="20" rx="2" fill="#3A3F52" />

                <path d="M258 285 C248 265, 250 250, 258 240"
                    stroke="#E36B5C"
                    stroke-width="4"
                    fill="none"
                    stroke-linecap="round" />

                <path d="M258 285 C268 260, 266 245, 262 232"
                    stroke="#E36B5C"
                    stroke-width="4"
                    fill="none"
                    stroke-linecap="round" />

                <path d="M258 285 C258 258, 254 240, 246 228"
                    stroke="#3B4A5C"
                    stroke-width="4"
                    fill="none"
                    stroke-linecap="round" />

                <!-- Kursi -->
                <rect x="150" y="330" width="14" height="70" rx="3" fill="#3A3F52" />
                <rect x="220" y="330" width="14" height="70" rx="3" fill="#3A3F52" />
                <rect x="140" y="310" width="100" height="14" rx="6" fill="#E36B5C" />
                <rect x="140" y="200" width="14" height="115" rx="6" fill="#E36B5C" />

                <!-- Orang -->
                <ellipse cx="190" cy="150" rx="26" ry="28" fill="#F2C29B" />

                <path d="M164 150 C160 120, 220 120, 216 150 C216 130, 164 130, 164 150 Z"
                    fill="#3A2A22" />

                <rect x="176" y="172" width="28" height="60" rx="12" fill="#2C3142" />

                <path d="M182 176 L198 176 L190 210 Z"
                    fill="#E36B5C" />

                <rect x="150" y="180" width="30" height="14" rx="7"
                    fill="#F2C29B"
                    transform="rotate(-18 165 187)" />

                <rect x="198" y="180" width="34" height="14" rx="7"
                    fill="#F2C29B"
                    transform="rotate(12 215 187)" />

                <rect x="176" y="228" width="14" height="70" rx="6"
                    fill="#1B1F2A"
                    transform="rotate(6 183 260)" />

                <rect x="198" y="228" width="14" height="80" rx="6"
                    fill="#1B1F2A"
                    transform="rotate(-4 205 265)" />

                <ellipse cx="188" cy="302" rx="14" ry="8" fill="#E36B5C" />
                <ellipse cx="216" cy="310" rx="14" ry="8" fill="#E36B5C" />

                <!-- Bubble chat -->
                <rect x="205" y="95" width="46" height="26" rx="8" fill="#E36B5C" />

                <path d="M215 121 L222 132 L228 121 Z"
                    fill="#E36B5C" />

                <circle cx="217" cy="108" r="2.5" fill="#fff" />
                <circle cx="228" cy="108" r="2.5" fill="#fff" />
                <circle cx="239" cy="108" r="2.5" fill="#fff" />

            </svg>

        </div>

        <!-- Panel form -->
        <div class="form-panel col-md-6 col-12 d-flex flex-column justify-content-center">

            <h2 class="login-title text-center mb-2">
                Login
            </h2>

            <p class="login-subtitle text-center mb-4">
                Sistem Informasi SMK YPC Tasikmalaya
            </p>

            <!-- Error -->
            @if ($errors->any())
                <div class="alert alert-danger py-2 px-3 mb-3" style="font-size: 13px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form Login -->
            <form method="POST" action="{{ route('login.process') }}">

                @csrf

                <!-- Username -->
                <div class="flat-input mb-3">

                    <input
                        type="text"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Username"
                        required
                        autofocus
                    >

                    <span class="field-icon">

                        <svg width="18"
                            height="18"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2">

                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />

                            <circle cx="12"
                                cy="7"
                                r="4" />

                        </svg>

                    </span>

                </div>

                <!-- Password -->
                <div class="flat-input mb-4">

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Kata sandi"
                        required
                    >

                    <button
                        type="button"
                        class="field-icon"
                        onclick="togglePassword()">

                        <svg width="18"
                            height="18"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2">

                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8Z" />

                            <circle cx="12"
                                cy="12"
                                r="3" />

                        </svg>

                    </button>

                </div>

                <!-- Tombol Login -->
                <button
                    type="submit"
                    class="btn btn-login w-100">

                    Login

                </button>

            </form>

        </div>

    </div>

    <script>

        function togglePassword() {

            const input = document.getElementById('password');

            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }

        }

    </script>

</body>

</html>
