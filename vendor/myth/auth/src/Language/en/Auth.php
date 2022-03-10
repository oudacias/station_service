<?php

return [
    // Exceptions
    'invalidModel'              => 'The {0} model must be loaded prior to use.',
    'userNotFound'              => 'Unable to locate a user with ID = {0, number}.',
    'noUserEntity'              => 'User Entity must be provided for password validation.',
    'tooManyCredentials'        => 'You may only validate against 1 credential other than a password.',
    'invalidFields'             => 'The "{0}" field cannot be used to validate credentials.',
    'unsetPasswordLength'       => 'You must set the `minimumPasswordLength` setting in the Auth config file.',
    'unknownError'              => 'Sorry, we encountered an issue sending the email to you. Please try again later.',
    'notLoggedIn'               => 'You must be logged in to access that page.',
    'notEnoughPrivilege'        => 'You do not have sufficient permissions to access that page.',

    // Registration
    'registerDisabled'          => 'Sorry, new user accounts are not allowed at this time.',
    'registerSuccess'           => 'Compte ajouté',
    'registerCLI'               => 'New user created: {0}, #{1}',

    // Deletion 
    
    'deletionSuccess'           => 'User was successfully deleted',

    // Activation
    'activationNoUser'          => 'Unable to locate a user with that activation code.',
    'activationSubject'         => 'Activate your account',
    'activationSuccess'         => 'Please confirm your account by clicking the activation link in the email we have sent.',
    'activationResend'          => 'Resend activation message one more time.',
    'notActivated'              => 'Ce compte n\'est pas encore activé.',
    'errorSendingActivation'    => 'Failed to send activation message to: {0}',

    // Login
    'badAttempt'                => 'Votre login ou mot de passe est incorret.',
    'loginSuccess'              => 'Bienvenue',
    'invalidPassword'           => 'Mot de passe incorrect.',

    // Forgotten Passwords
    'forgotDisabled'            => 'Reseting password option has been disabled.',
    'forgotNoUser'              => 'Unable to locate a user with that email.',
    'forgotSubject'             => 'Password Reset Instructions',
    'resetSuccess'              => 'Your password has been successfully changed. Please login with the new password.',
    'forgotEmailSent'           => 'A security token has been emailed to you. Enter it in the box below to continue.',
    'errorEmailSent'            => 'Unable to send email with password reset instructions to: {0}',
    'errorResetting'            => 'Unable to send reset instructions to {0}',

    // Passwords
    'errorPasswordLength'       => 'Mot de passe doit etre plus de {0, number} charactères.',
    'suggestPasswordLength'     => 'Pass phrases - up to 255 characters long - make more secure passwords that are easy to remember.',
    'errorPasswordCommon'       => 'Password must not be a common password.',
    'suggestPasswordCommon'     => 'The password was checked against over 65k commonly used passwords or passwords that have been leaked through hacks.',
    'errorPasswordPersonal'     => 'Passwords cannot contain re-hashed personal information.',
    'suggestPasswordPersonal'   => 'Variations on your email address or username should not be used for passwords.',
    'errorPasswordTooSimilar'    => 'Password is too similar to the username.',
    'suggestPasswordTooSimilar'  => 'Do not use parts of your username in your password.',
    'errorPasswordPwned'        => 'The password {0} has been exposed due to a data breach and has been seen {1, number} times in {2} of compromised passwords.',
    'suggestPasswordPwned'      => '{0} should never be used as a password. If you are using it anywhere change it immediately.',
    'errorPasswordPwnedDatabase' => 'a database',
    'errorPasswordPwnedDatabases' => 'databases',
    'errorPasswordEmpty'        => 'A Password is required.',
    'passwordChangeSuccess'     => 'Password changed successfully',
    'userDoesNotExist'          => 'Password was not changed. User does not exist',
    'resetTokenExpired'         => 'Sorry. Your reset token has expired.',

    // Groups
    'groupNotFound'             => 'Unable to locate group: {0}.',
    'groupAdded'                => '{0} successfully added',
    'groupExists'                => 'Group already exists',
    // Permissions
    'permissionNotFound'        => 'Unable to locate permission: {0}',

    // Banned
    'userIsBanned'              => 'User has been banned. Contact the administrator',

    // Too many requests
    'tooManyRequests'           => 'Too many requests. Please wait {0, number} seconds.',

    // Update User

    'userRoleUpdated'           => 'Role est modifié avec succès',

    // Login views
    'home'                      => 'Home',
    'current'                   => 'Current',
    'forgotPassword'            => 'Forgot Your Password?',
    'enterEmailForInstructions' => 'No problem! Enter your email below and we will send instructions to reset your password.',
    'email'                     => 'Email',
    'emailAddress'              => 'Email Address',
    'sendInstructions'          => 'Send Instructions',
    'loginTitle'                => 'Connectez-vous',
    'loginAction'               => 'Se Connecter',
    'rememberMe'                => 'Remember me',
    'needAnAccount'             => 'Need an account?',
    'forgotYourPassword'        => 'Forgot your password?',
    'password'                  => 'Password',
    'repeatPassword'            => 'Repeat Password',
    'emailOrUsername'           => 'Votre Email ou votre Nom',
    'username'                  => 'Nom',
    'register'                  => 'Ajouter un compte',
    'signIn'                    => 'Se Connecter',
    'alreadyRegistered'         => 'Already registered?',
    'weNeverShare'              => 'We\'ll never share your email with anyone else.',
    'resetYourPassword'         => 'Reset Your Password',
    'enterCodeEmailPassword'    => 'Enter the code you received via email, your email address, and your new password.',
    'token'                     => 'Token',
    'newPassword'               => 'New Password',
    'newPasswordRepeat'         => 'Repeat New Password',
    'resetPassword'             => 'Reset Password',
];
