<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerVFkiDsb\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerVFkiDsb/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerVFkiDsb.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerVFkiDsb\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerVFkiDsb\App_KernelDevDebugContainer([
    'container.build_hash' => 'VFkiDsb',
    'container.build_id' => '9b028409',
    'container.build_time' => 1599464209,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerVFkiDsb');