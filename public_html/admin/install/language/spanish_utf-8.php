<?php
// +--------------------------------------------------------------------------+
// | glFusion CMS                                                             |
// +--------------------------------------------------------------------------+
// | spanish_utf-8.php                                                        |
// |                                                                          |
// | Archivo de lenguaje español para el script de instalación de glFusion    |
// +--------------------------------------------------------------------------+
// | $Id::                                                                   $|
// +--------------------------------------------------------------------------+
// | Derecho de autor (C) 2008-2009 por los siguientes autores:               |
// |                                                                          |
// | Marvin Ortega          maty1206 EN maryanlinux PUNTO com                 |
// | Mark R. Evans          mark EN glfusion PUNTO org                        |
// |                                                                          |
// | Basado en el CMS Geeklog                                                 |
// | Derecho de autor (C) 2000-2008 por los siguientes autores:               |
// |                                                                          |
// | Autores: AnTony Bibbs      - tony EN tonybibbs PUNTO com                 |
// |          Mark Limburg    - mlimburg EN users PUNTO sourceforge PUNTO net |
// |          Jason Whittenburg - jwhitten EN securitygeeks PUNTO com         |
// |          Dirk Haun         - dirk EN haun-online PUNTO de                |
// |          Randy Kolenko     - randy EN nextide PUNTO ca                   |
// |          Matt West         - matt EN mattdanger PUNTO net                |
// +--------------------------------------------------------------------------+
// |                                                                          |
// +--------------------------------------------------------------------------+
// |Este programa es Software Libre; usted puede redistribuirlo y/o           |
// |modificarlo bajo los términos de la Licencia Pública General GNU          |
// |como lo publica la Fundación de Software Libre FSF, tanto en su versión 2 |
// |o (a su elección) cualquier versión posterior.                            |
// |                                                                          |
// |Este programa es distribuido con la esperanza de que le será útil,        |
// |pero SIN NINGUNA GARANTÍA; incluso sin la garantía implícita por el       |
// |MERCADEO o EJERCICIO DE ALGÚN PROPÓSITO en particular. Vea la             |
// |Licencia Pública General GNU para más detalles.                           |
// |                                                                          |
// |Usted debe haber recibido una copia de la Licencia Pública General GNU    |
// |junto con este programa, si no, escriba a la "FSF Free Software           |
// |Foundation, Inc.", 59 Temple Place - Suite 330, Boston, MA 02111-1307,USA.|
// +--------------------------------------------------------------------------+

// +--------------------------------------------------------------------------+

$LANG_CHARSET = 'utf-8';

// +--------------------------------------------------------------------------+
// index.php

$LANG_INSTALL = array(
    'back_to_top'               => 'Ir arriba',
    'calendar'                  => '¿Cargar la extensión de calendario?',
    'calendar_desc'             => 'Un calendario en línea / sistema de eventos. Incluye un calendario para sitios anchos y calendario personal para los usuarios.',
    'connection_settings'       => 'Configuraciones de conexión',
    'content_plugins'           => 'Contenido & Extensiones',
    'copyright'                 => '<a href="http://www.glfusion.org" target="_blank">glFusion</a> es liberado como Software libre bajo la <a href="http://www.gnu.org/licenses/gpl-2.0.txt" target="_blank">Licencia GNU/GPL v2.0.</a>',
    'core_upgrade_error'        => 'Hubo un error durante el desarrollo de la actualización del núcleo.',
    'correct_perms'             => 'Por favor corrija los errores listados a continuación. Una vez que hayan sido corregidos, utilice el botón <b>Revisar</b> para validar el ambiente.',
    'current'                   => 'Actual',
    'database_exists'           => 'La base de datos actualmente contiene tablas de glFusion. Por favor remueva las tablas glFusion antes de iniciar la nueva instalación.',
    'database_info'             => 'Información de la base de datos',
    'db_hostname'               => 'Nombre Host de la base de datos',
    'db_hostname_error'         => 'El nombre Host de la base de datos no puede estar en blanco.',
    'db_name'                   => 'Nombre de la base de datos',
    'db_name_error'             => 'El nombre de la base de datos no puede estar en blanco.',
    'db_pass'                   => 'Contraseña de la base de datos',
    'db_table_prefix'           => 'Prefijo de las tablas de la base de datos',
    'db_type'                   => 'Tipo de base de datos',
    'db_type_error'             => 'El tipo de base de datos debe de ser seleccionado',
    'db_user'                   => 'Nombre de usuario de la base de datos',
    'db_user_error'             => 'El nombre de usuario de la base de datos.',
    'dbconfig_not_found'        => 'No es posible localizar el archivo db-config.php o db-config.php.dist. Por favor asegúrese de que ha ingresado la ruta correcta a su directorio "private".',
    'dbconfig_not_writable'     => 'El archivo db-config.php no tiene definido el permiso de escritura. Por favor asegúrese de que el servidor web tiene permiso de escribir este archivo.',
    'directory_permissions'     => 'Permisos de directorio',
    'enabled'					=> 'Habilitado',
    'env_check'					=> 'Verificar ambiente',
    'error'                     => 'Error',
    'file_permissions'          => 'Permisos de archivos',
    'file_uploads'				=> 'Varias características de glFusion requieren la habilidad de cargar archivos, esto debe estar habilitado.',
    'filemgmt'                  => '¿Cargar Extensión Administrador de archivos?',
    'filemgmt_desc'             => 'Administrador de descarga de archivos. Un método sencillo de ofrecer descarga de archivos, organizado por categorías.',
    'filesystem_check'          => 'Verificar sistema de archivos',
    'forum'                     => '¿Cargar Extensión Foro?',
    'forum_desc'                => 'Un sistema de foro y comunidad en línea. Proporciona colaboración e interactividad de la comunidad.',
    'geeklog_migrate'           => 'Migrar un sitio web potenciado por Geeklog v1.5+',
    'hosting_env'               => 'Verificar ambiente anfitrión',
    'install'                   => 'Instalar',
    'install_heading'           => 'Instalación de glFusion',
    'install_steps'             => 'PASOS DE INSTALACIÓN',
    'invalid_geeklog_version'   => 'El instalador no fue capaz de localizar el archivo siteconfig.php. ¿Está seguro que está migrando de Geeklog v1.5.0 o versión superior?  Si usted tiene una instalación anterior a Geeklog v1.5.0, por favor actualice primeramente a la última versión de Geeklog v1.5.0 y luego intente de nuevo la migración.',
    'language'                  => 'Idioma',
    'language_task'             => 'Idioma & tarea',
    'libcustom_not_writable'    => 'lib-custom.php no tiene permisos de escritura.',
    'links'                     => '¿Cargar la Extensión Enlaces?',
    'links_desc'                => 'Un sistema de administración de enlaces. proporciona enlaces a otros sitios interesantes, organizado por categoría.',
    'load_sample_content'       => '¿Cargar Contenido de ejemplo para el sitio?',
    'mediagallery'              => '¿Cargar Extensión Galería multimedia?',
    'mediagallery_desc'         => 'Un sistema de administración de multimedia. Puede ser utilizado como una simple galería de fotografías o un robusto sistema de administración de multimedia capaz de soportar audio, vídeo e imágenes.',
   'memory_limit'				=> 'Se recomienda tener al menos 48M de memoria habilitada en su sitio.',
    'missing_db_fields'         => 'Por favor ingrese en todos los campos la información requerida de la base de datos.',
    'new_install'               => 'Nueva instalación',
    'next'                      => 'Siguiente',
    'no_db'                     => 'Aparentemente la base de datos no existe.',
    'no_db_connect'             => 'No es posible establecer conexión con la base de datos',
    'no_innodb_support'         => 'Has seleccionado MySQL con InnoDB pero su base de datos no soporta índices InnoDB.',
    'no_migrate_glfusion'       => 'No puedes migrar un sitio existente construido con glFusion. Por favor elija en su lugar la opción de Actualización.',
    'none'                      => 'Ninguno',
    'not_writable'              => 'NO POSEE PERMISOS DE ESCRITURA',
    'notes'						=> 'Notas',
    'off'                       => 'Apagado',
    'ok'                        => 'OK',
    'on'                        => 'Encendido',
    'online_help_text'          => 'Ayuda de instalación en línea <br /> en glFusion.org',
    'online_install_help'       => 'Ayuda de instalación en línea',
    'open_basedir'				=> 'Si <strong>open_basedir</strong> hay restricciones habilitadas en su sitio, puede causar problemas de permisos durante la instalación. El verificador del sistema de archivos, revisará que no hayan inconvenientes.',
    'path_info'					=> 'Información de la ruta',
    'path_prompt'               => 'Ruta al directorio private/ ',
    'path_settings'             => 'Configuraciones de la ruta',
    'perform_upgrade'			=> 'Realizar actualización',
    'php_req_version'			=> 'glFusion requiere PHP en su versión 4.3.0 o superior.',
    'php_settings'				=> 'Configuraciones de PHP',
    'php_version'				=> 'Versión de PHP',
    'php_warning'				=> 'Si alguno de los objetos en listados a continuación, aparecen marcados en color <span class="no">rojo</span>, significa que encontrarás problemas con tu sitio glFusion. Verifique con su proveedor de Alojamiento acerca de cómo cambiar alguna de las configuraciones de PHP.',
    'plugin_install'			=> 'Instalación de extensiones',
    'plugin_upgrade_error'      => 'Hubo un problema durante la actualización de %s extensiones, por favor revise el archivo de registro error.log para más detalles.<br />',
    'plugin_upgrade_error_desc' => 'Las siguientes extensiones no fueron actualizadas. por favor revise el archivo de registro error.log para más detalles.<br />',
    'polls'                     => '¿Cargar la extensión Encuesta?',
    'polls_desc'                => 'Un sistema de encuestas en línea. proporciona encuestas para que los usuarios de su sitio voten sobre varios temas.',
    'post_max_size'				=> 'glFusion le permite cargar extensiones, imágenes y archivos. Deberías de permitir al menos 8M como tamaño máximo de subida en PHP (maximum post size).',
    'previous'                  => 'Regresar',
    'proceed'                   => 'Proceder',
    'recommended'               => 'Recomendado',
    'register_globals'			=> 'Si PHP <strong>register_globals</strong> está habilitado, puede crear inconvenientes de seguridad.',
    'safe_mode'					=> 'Si PHP <strong>safe_mode</strong> está habilitado, algunas funcionalidades de glFusion pueden no funcionar correctamente. Especialmente la extensión Galería multimedia .',
    'samplecontent_desc'        => 'Si está marcado, instalará contenidos de ejemplo como bloques, historias y páginas estáticas. <strong>Esto es recomendado para nuevos usuarios de glFusion.</strong>',
    'select_task'               => 'Seleccione la tarea',
    'session_error'             => 'Su sesión ha expirado. Por favor reinicie el proceso de instalación.',
    'setting'                   => 'Configuraciones',
    'site_admin_url'            => 'URL de Administración del sitio',
    'site_admin_url_error'      => 'La URL de Administración del sitio no puede estar en blanco.',
    'site_email'                => 'Correo electrónico del sitio',
    'site_email_error'          => 'El correo electrónico del sitio no puede estar en blanco.',
    'site_email_notvalid'       => 'El correo electrónico del sitio no es una dirección electrónica válida.',
    'site_info'					=> 'Información del sitio',
    'site_name'                 => 'Nombre del sitio',
    'site_name_error'           => 'El nombre del sitio no puede estar en blanco.',
    'site_noreply_email'        => 'Correo electrónico para no réplica del sitio',
    'site_noreply_email_error'  => 'El correo electrónico para no réplica del sitio no puede estar en blanco.',
    'site_noreply_notvalid'     => 'El correo electrónico para no réplica del sitio no es una dirección electrónica válida.',
    'site_slogan'               => 'Lema del sitio',
    'site_upgrade'              => 'Actualizar un sitio glFusion existente ',
    'site_url'                  => 'URL del sitio',
    'site_url_error'            => 'El URL del sitio no puede estar en blanco.',
    'siteconfig_exists'         => 'Se ha encontrado un archivo siteconfig.php existente. Por favor borre ese archivo antes de iniciar la instalación.',
    'siteconfig_not_found'      => 'No fue posible encontrar el archivo siteconfig.php, ¿Está seguro de que se trata de una actualización?',
    'siteconfig_not_writable'   => 'El archivo siteconfig.php no tiene permisos de escritura, o el directorio en donde siteconfig.php está almacenado no tiene permisos de escritura. Por favor, corrija este inconveniente antes de proceder.',
    'sitedata_help'             => 'Seleccione el tipo de base de datos que utilizará. Generalmente <strong>MySQL</strong>. También selecciona si deseas utilizar el conjunto de caracteres <strong>UTF-8</strong> (esto debería de ser seleccionado para sitios multi lenguajes.)<br /><br /><br />Ingrese el nombre del Host del servidor de la base de datos. No debería de ser el mismo servidor web, en caso de duda verifique con su proveedor de alojamiento.<br /><br />Ingrese el nombre de su base de datos. <strong>La base de datos debe de existir.</strong> si no conoce el nombre de la base de datos, contacte a su proveedor de alojamiento.<br /><br />Ingrese el nombre de usuario para conectarse a la base de datos. Si no conoce el nombre del usuario de la base de datos, contacte a su proveedor de alojamiento.<br /><br /><br />Ingrese la contraseña para conectarse a la base de datos. Si no conoce la contraseña de la base de datos, contacte a su proveedor de alojamiento.<br /><br />Ingrese un prefijo a ser utilizado en la tabla para las tablas de la base de datos. Esto es de utilidad para separar múltiples sitios o sistemas en la misma base de datos.<br /><br />Ingrese el nombre de su sitio. Será mostrado en la cabecera el sitio. Por ejemplo, glFusion o Mark Marbles. No se preocupe, luego podrá cambiarlo.<br /><br />Ingrese el lema de su sitio. Será mostrado en la cabecera de su sitio debajo del nombre del sitio. Por ejemplo, sinergia - estabilidad - estilo. No se preocupe, luego podrá cambiarlo.<br /><br />Ingrese la dirección de correo electrónico principal de su sitio. Esta es la dirección de correo electrónico por defecto para la cuenta de Administrador. No se preocupe, luego podrá cambiarla.<br /><br />Ingrese la dirección de correo electrónico de no réplica de su sitio. Será utilizada para enviar automáticamente  nuevos usuarios, contraseñas, restablecimiento, y otras notificaciones por correo electrónico. No se preocupe, luego podrá cambiarlo. <br /><br />Por favor confirme que ésta es la dirección web o URL utilizada para acceder a la página principal de su sitio.<br /><br /><br />Por favor confirme que ésta es la dirección web o URL utilizada para acceder a la sección de administración de su sitio.',
    'sitedata_missing'          => 'Los siguientes problemas fueron encontrados con la información que ha ingresado del sitio:',
    'system_path'               => 'Ajustes de ruta',
    'unable_mkdir'              => 'No fue posible crear el directorio',
    'unable_to_find_ver'        => 'No fue posible determinar la versión de glFusion.',
    'upgrade_error'             => 'Error de actualización',
    'upgrade_error_text'        => 'Un error ocurrió mientras se estaba actualizando la instalación de glFusion.',
    'upgrade_steps'             => 'PASOS DE ACTUALIZACIÓN',
    'upload_max_filesize'		=> 'glFusion le permite cargar extensiones, imágenes y archivos. Debe de permitir al menos 8M para la carga de subida en las configuraciones de PHP (max upload size).',
    'use_utf8'                  => 'Utilizar UTF-8',
    'welcome_help'              => 'Bienvenido al Asistente de instalación del CMS glFusion. Puede instalar un nuevo sitio glFusion, actualizar un sitio glFusion existente, o migrar desde un sitio Geeklog v1.5 existente.<br /><br />Por favor seleccione el idioma para el asistente, y la tarea a realizar, luego presione <strong>Siguiente</strong>.',
    'wizard_version'            => 'v' . GVERSION . ' Asistente de instalación',
    'system_path_prompt'        => 'Ingrese la ruta completa, ruta absoluta de su servidor al directorio <strong>private/</strong> de glFusion.<br /><br />Este directorio contiene el archivo <strong>db-config.php.dist</strong> o <strong>db-config.php</strong>.<br /><br />Ejemplos: /home/www/glfuison/private o c:/www/glfusion/private.<br /><br /><strong>Sugerencia:</strong> La ruta absoluta de su directorio public_html/ parece ser:<br />%s<br /><br /><strong>Configuraciones avanzadas</strong> Te permite sobre escribir varias de las rutas por defecto. Generalmente no necesitas modificar o definir esas rutas. El sistema las determinará automáticamente.',
    'advanced_settings'         => 'Configuraciones avanzadas',
    'log_path'                  => 'Ruta de registros',
    'lang_path'                 => 'Ruta de idiomas',
    'backup_path'               => 'Ruta de respaldos',
    'data_path'                 => 'Ruta de la información',
    'language_support'          => 'Soporte de idioma',
    'language_pack'             => 'glFusion vienen en idioma inglés, pero una vez que lo has instalado puedes descargar e instalar  el <a href="http://www.glfusion.org/filemgmt/viewcat.php?cid=18" target="_blank">Paquete de idioma</a> el cual contiene los archivos de idioma para todos los idomoas soportados.',
);

// +---------------------------------------------------------------------------+
// success.php

$LANG_SUCCESS = array(
    0 => 'Instalación completada',
    1 => 'Instalación de glFusion ',
    2 => ' ¡Completado!',
    3 => 'Felicidades, usted ha logrado exitosamente ',
    4 => ' glFusion. Por favor, tome un minuto para leer la información mostrada a continuación.',
    5 => 'Para ingresar en su nuevo sitio glFusion, por favor utilice esta cuenta:',
    6 => 'Nombre de usuario:',
    7 => 'NuevoAdministrador',
    8 => 'Contraseña:',
    9 => 'contraseña',
    10 => 'Advertencia de seguridad',
    11 => 'No olvide',
    12 => 'cosas',
    13 => 'Remover o renombrar el directorio de instalación,',
    14 => 'Cambie la',
    15 => 'contraseña de la cuenta.',
    16 => 'Definir permisos',
    17 => 'y',
    18 => 'retroceder',
    19 => '<strong>Nota:</strong> Debido a que el modelo de seguridad ha cambiado, hemos creado una nueva cuenta con los privilegios necesarios para que usted administre su nuevo sitio. El nombre de usuario para esta nueva cuenta es <b>NuevoAdministrador/b> y la contraseña es <b>contraseña</b>',
    20 => 'instalado',
    21 => 'actualizado'
);
?>