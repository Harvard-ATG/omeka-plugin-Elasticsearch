<?php $result_img = record_image($record, 'thumbnail', array('class' => 'elasticsearch-result-image')); ?>
<?php if($result_img): ?>
    <a href="<?php echo $record_url; ?>"><?php echo $result_img; ?></a>
<?php endif; ?>

<ul>
    <li title="resulttype"><b>Result Type:</b> <?php echo $hit['_source']['resulttype']; ?></li>

<?php if(isset($hit['_source']['itemtype'])): ?>
    <li title="itemtype"><b>Item Type:</b> <?php echo $hit['_source']['itemtype']; ?></li>
<?php endif; ?>

<?php if(isset($hit['_source']['collection'])): ?>
    <li title="collection"><b>Collection:</b> <?php echo $hit['_source']['collection']; ?></li>
<?php endif; ?>

<?php if(isset($hit['_source']['elements']) && isset($hit['_source']['element'])): ?>
    <?php $elements = $hit['_source']['elements']; ?>
    <?php foreach($elements as $element): ?>
        <li class="elasticsearch-element" title="element.<?php echo $element['name']; ?>">
            <b><?php echo $element['displayName']; ?>:</b>
            <?php if(is_array($element['text'])): ?>
                <?php if(count($element['text']) == 1): ?>
                    <?php echo $element['text'][0]; ?>
                <?php elseif(count($element['text']) > 1): ?>
                    <ul class="elasticsearch-element-texts" >
                    <?php foreach($element['text'] as $text): ?>
                        <li><?php echo $text; ?></li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            <?php else: ?>
                <?php echo $element['text']; ?>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
<?php endif; ?>

<?php if(isset($hit['_source']['tags']) && count($hit['_source']['tags']) > 0): ?>
    <li title="tags"><b>Tags:</b>  <?php echo implode(", ", $hit['_source']['tags']); ?></li>
<?php endif; ?>

    <li title="created"><b>Record Created: </b> <?php echo Elasticsearch_Utils::formatDate($hit['_source']['created']); ?></li>
    <li title="updated"><b>Record Updated: </b> <?php echo Elasticsearch_Utils::formatDate($hit['_source']['updated']); ?></li>
</ul>

