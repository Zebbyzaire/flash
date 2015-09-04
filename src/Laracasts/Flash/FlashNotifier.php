<?php namespace Laracasts\Flash;

class FlashNotifier
{

    /**
     * The session writer.
     *
     * @var SessionStore
     */
    private $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param SessionStore $session
     */
    function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * Flash an information message.
     *
     * @param string $message
     */
    public function info($title, $message)
    {
        $this->message($title, $message, 'info');

        return $this;
    }

    /**
     * Flash a success message.
     *
     * @param  string $message
     * @return $this
     */
    public function success($title, $message)
    {
        $this->message($title, $message, 'success');

        return $this;
    }

    /**
     * Flash an error message.
     *
     * @param  string $message
     * @return $this
     */
    public function error($title, $message)
    {
        $this->message($title, $message, 'error');

        return $this;
    }

    /**
     * Flash a warning message.
     *
     * @param  string $message
     * @return $this
     */
    public function warning($title, $message)
    {
        $this->message($title, $message, 'warning');

        return $this;
    }

    /**
     * Flash an overlay modal.
     *
     * @param  string $message
     * @param  string $title
     * @return $this
     */
    public function overlay($title, $message, $level)
    {
        $this->message($title, $message, $level);

        $this->session->flash('flash_notification.overlay', true);

        return $this;
    }

    /**
     * Flash a general message.
     *
     * @param  string $message
     * @param  string $level
     * @return $this
     */
    public function message($title, $message, $level)
    {
        $this->session->flash('flash_notification.title', $title);
        $this->session->flash('flash_notification.message', $message);
        $this->session->flash('flash_notification.level', $level);

        return $this;
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function imptant()
    {
        $this->session->flash('flash_notification.important', true);

        return $this;
    }

}
