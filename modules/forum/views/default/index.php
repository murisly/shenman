<div class="forum-default-index">
    <h1>起始页</h1>
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
        <code><?= $path ?></code>
    </p>

    <div>
        <img src="../images/water.jpg"/>
    </div>

    <div>
        next<br>
        <img src="../images/water.jpg"/>
    </div>
</div>
