#!/bin/bash

# Configurações
local_dir="/caminho/para/o/seu/diretorio"  # Diretório local a ser monitorado
ftp_server="seu_servidor_ftp"
ftp_user="seu_usuario_ftp"
ftp_pass="sua_senha_ftp"
remote_dir="/caminho/para/o/diretorio/remoto"  # Diretório remoto no servidor FTP

# Função para fazer o upload via FTP
function ftp_upload() {
    local file="$1"
    local remote_file="$2"
    lftp -u "$ftp_user",$ftp_pass "$ftp_server" <<EOF
    put -O "$file" "$remote_file"
    bye
EOF
}

# Função para encontrar novos arquivos e pastas
function find_new_files() {
    find "$local_dir" -newermt "1 day" -print0 | while IFS= read -r -d '' file; do
        # Verifica se é um arquivo ou diretório
        if [[ -f "$file" ]]; then
            # Calcula o caminho remoto
            remote_file="$remote_dir/${file#"$local_dir/"}"
            # Faz o upload
            ftp_upload "$file" "$remote_file"
        elif [[ -d "$file" ]]; then
            # Cria o diretório remoto (se não existir)
            lftp -u "$ftp_user",$ftp_pass "$ftp_server" <<EOF
            mkdir -p "$remote_dir/${file#"$local_dir/"}"
            bye
EOF
        fi
    done
}

# Chamada da função principal
find_new_files
