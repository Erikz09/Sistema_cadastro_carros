<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color:#ffffff; font-family:Georgia,serif;">
            <i class="fas fa-user-circle mr-2" style="color:#4d70b8;"></i> Perfil
        </h2>
    </x-slot>

    <div style="max-width:720px; margin:0 auto; display:flex; flex-direction:column; gap:24px;">

        <!-- Informações -->
        <div style="background:#111827; border:1px solid #1f2d4a; border-radius:12px; padding:32px;">
            <h3 style="font-size:11px; letter-spacing:3px; text-transform:uppercase; color:#4d70b8; margin-bottom:20px;">
                <i class="fas fa-id-card mr-2"></i> Informações do Perfil
            </h3>
            @include('profile.partials.update-profile-information-form')
        </div>

        <!-- Senha -->
        <div style="background:#111827; border:1px solid #1f2d4a; border-radius:12px; padding:32px;">
            <h3 style="font-size:11px; letter-spacing:3px; text-transform:uppercase; color:#4d70b8; margin-bottom:20px;">
                <i class="fas fa-lock mr-2"></i> Alterar Senha
            </h3>
            @include('profile.partials.update-password-form')
        </div>

        <!-- Excluir conta -->

        <div style="background:#1a0f0f; border:1px solid #971111; border-radius:12px; padding:32px;">
            <h3 style="font-size:11px; letter-spacing:3px; text-transform:uppercase; color:#dc3545; margin-bottom:20px;">
                <i class="fas fa-exclamation-triangle mr-2"></i> Zona de Perigo
            </h3>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>