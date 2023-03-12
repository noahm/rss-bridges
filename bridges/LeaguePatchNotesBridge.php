<?php

declare(strict_types=1);

class LeaguePatchNotesBridge extends BridgeAbstract {
        const MAINTAINER = 'noahm';
        const NAME = 'League Patch Notes';
        const URI = 'https://www.leagueoflegends.com/en-us/news/tags/patch-notes/';
        const DESCRIPTION = 'RSS feed for Patch Notes posts for League of Legends';

        public function getIcon() {
                return 'https://www.leagueoflegends.com/static/favicon-0cf29ce019f7cd1e7b24f85ab6ff97da.ico';
        }

        public function collectData() {
                $html = getSimpleHTMLDOM(self::URI);
                $articles = $html->find('article');
                foreach ($articles as $article) {
                        $item = array();
                        $item['title'] = $article->find('h2', 0)->innertext();
                        $path = $article->parentNode()->getAttribute('href');
                        $item['uri'] = 'https://leagueoflegends.com' . $path;
                        $item['uid'] = $path;
                        $item['timestamp'] = $article->find('time', 0)->getAttribute('datetime');
                        $item['author'] = $article->find('span[data-testid$=":author"]', 0)->innertext();
                        $item['content'] = $this->getArticleContent($item['uri']);
                        $item['enclosures'] = array($article->find('img', 0)->getAttribute('src'));
                        $this->items[] = $item;
                }
        }

        private function getArticleContent($uri) {
                $html = getSimpleHTMLDOMCached($uri);
                return $html->getElementById('patch-notes-container')->outertext();
        }
}
