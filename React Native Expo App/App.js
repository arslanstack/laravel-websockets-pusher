// App.js
import React, { useEffect } from 'react';
import { View, Text } from 'react-native';
import { pusher, initPusher, subscribeToChannel, registerForPushNotifications } from './services/PusherService';
import * as Notifications from 'expo-notifications';

Notifications.setNotificationHandler({
  handleNotification: async () => ({
    shouldShowAlert: true,
    shouldPlaySound: true,
    shouldSetBadge: false,
  }),
});

export default function App() {
  useEffect(() => {
    initPusher();
    subscribeToChannel('like-channel', handlePusherEvent);
    registerForPushNotifications(); // Call this function to register for push notifications
  }, []);

  const handlePusherEvent = (event) => {
    // console.log(`Pusher Event received: ${event}`);
    console.log('Event Object:', event);
    if (event.eventName == 'post-like') {
      const eventData = JSON.parse(event.data);
      const postName = eventData.post_name;

      Notifications.scheduleNotificationAsync({
        content: {
          title: `${eventData.liker_name} liked your post!`,
          body: postName,
        },
        trigger: null,
      });
    }
    // Show a local notification when a Pusher event is received
    
  };

  return (
    <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center', textAlign:'center' }}>
      <Text>Once Someone Likes Your Photo You will receive notification over here!</Text>
    </View>
  );
}
