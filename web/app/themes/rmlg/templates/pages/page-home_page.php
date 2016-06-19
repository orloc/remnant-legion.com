<?php
    $client = new \GuzzleHttp\Client();
    $request = new \GuzzleHttp\Psr7\Request('GET', 'http://dev.servall.xyz/public/remnant/member_list');

    $response = $client->send($request);

    $member_list = json_decode($response->getBody()->getContents(), true);

    $images = [];
    foreach ($member_list as $m) {
        array_push($images, sprintf("https://imageserver.eveonline.com/Character/%s_64.jpg", $m['character_id']));
    }

    shuffle($images);
?>
<div class="row">
    <div class="col-sm-7">
        <?= apply_filters('the_content', $page->post_content) ?>
        <button class="btn btn-default btn-join">
            Join Us
        </button>
    </div>
    <div class="col-sm-5">
        <div class="grid">
            <?php foreach($images as $i): ?>
                <div class="grid-item">
                    <img src="<?= $i?>"/>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-xs-12">
        <?php if (strlen($bottom_field)): ?>
            <h4 class="bottom-field"><?= $bottom_field ?></h4>
        <?php endif; ?>
    </div>
</div>
