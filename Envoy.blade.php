@servers(['web' => 'root@ces-rc.com.ng'])

@task('foo', ['on' => 'web', 'confirm' => true])
    ls -la
@endtask